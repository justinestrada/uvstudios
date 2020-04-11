/* eslint-disable */
;(function(window) {
	'use strict';
	var document = window.document;
	function textSearcher(query_selector, input_field, search_count_output, result_class) {
		this._init(query_selector, input_field, search_count_output, result_class);
		return {
			_init: this._init.bind(this),
			_search: this._search.bind(this),
			_destroy: this._destroy.bind(this),
		}
	}
	textSearcher.prototype = {
		_init: function(query_selector, input_field, search_count_output, result_class) {
			var document_nodes = document.querySelectorAll(query_selector);
			this.searchable_nodes = [];
			this.search_instances = [];
			for (var node_index = 0; node_index < document_nodes.length; node_index++) {
				var node = document_nodes[node_index];
				if (node.offsetParent !== null && node.offsetHeight > 0 && node.childNodes.length && node.innerText.length) {
					this.searchable_nodes.push(node);
				}
			}
			this.searchable_nodes_length = this.searchable_nodes.length;
			if (input_field && (input_field = document.querySelectorAll(input_field)[0])) {
				this.input_field = input_field;
				this.input_field.addEventListener("keyup", this.searchInputValue.bind(this));
			}
			if (search_count_output && (search_count_output = document.querySelectorAll(search_count_output)[0])) {
				this.search_count_output = search_count_output;
			}
			this.result_class = result_class || "js-textSearcher-highlight";
			return null;
		},
		_search: function(search_value) {
			if (typeof search_value == "undefined") {
				if (this.input_field) {
					search_value = this.input_field.value;
				} else {
					console.error("You can only call this method without a value if an input field is bound");
					return false;
				}
			}
			var search_value_length = search_value.length,
					search_regex = new RegExp(search_value.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&"), "gi"),
					node_index = 0;
			this.search_count = 0;
			var instance_index = 0;
			while (instance_index < this.search_instances.length) {
				this.search_instances[instance_index].revert();
				instance_index++;
			}
			this.search_instances = [];
			if (search_value_length) {
				while (node_index < this.searchable_nodes_length) {
					var node = this.searchable_nodes[node_index];
					var instance = findAndReplaceDOMText(node, {
						find: search_regex,
						replace: function(portion, match) {
							var el = document.createElement('span');
							el.className = this.result_class;
							el.innerHTML = portion.text;
							return el;
						}.bind(this)
					});
					this.search_count += instance.reverts.length;
					this.search_instances.push(instance);
					node_index++;
				}
			}
			if (this.search_count_output) {
				this.search_count_output.textContent = this.search_count;
			}
		},
		_destroy: function() {
			if (this.input_field) {
				this.input_field.removeEventListener("keyup", this.searchInputValue);
			}
		},
		searchInputValue(event) {
			this._search(event.target.value);
		}
	}
	window.textSearcher = textSearcher;
}) (window);

export const FAQ = {
  typingTimer: null, // timer identifier
  doneTypingInterval: 250,  // .25 seconds
  onLoad: function() {
    if ( $('.template-faq').length ) {
      const searchHighlighter = new textSearcher('.accordion .card', '#search-faq', '.search-count');
      searchHighlighter._search();
      $('#search-faq').on('input', function() {
        FAQ.handleSearch($(this).val().toLowerCase())
        clearTimeout(FAQ.typingTimer)
        FAQ.typingTimer = setTimeout(FAQ.showFirstAccordion, FAQ.doneTypingInterval)
      })
      $('#submit-search-form').on('submit', function(e) {
        e.preventDefault()
      })
      $('.input-group [data-function="clear-search"]').on('click', (e) => {
        e.preventDefault()
        $('.input-group [data-function="search-term"]').val('')
        FAQ.handleSearch('')
        searchHighlighter._search();
      })
    }
  },
  toggleClearSearch: function(searchTerm) {
    if (searchTerm.length > 0) {
      $('.input-group [data-function="clear-search"]').show()
      $('[data-function="search-term"]').removeClass('rounded-right')
    } else {
      $('.input-group [data-function="clear-search"]').hide()
      $('[data-function="search-term"]').addClass('rounded-right')
    }
  },
  handleSearch: function(searchTerm) {
    FAQ.toggleClearSearch(searchTerm);
    // is topic showing or hidden
    let faqTopicsShowing = new Array($('.accordion .card').length).fill(false)
    $('.accordion .card').each((index, cardElement) => {
      const topicTitle = $(cardElement).find('.topic-title');
      // count to know if all questions in a topic // are hidden - used to hide topic if no results
      let hiddenFAQs = 0;
      // check if faq item matches search string and hide if not
      $(cardElement).find('.faq-item').each((faqIndex, faqElement) => {
        const question = $(faqElement).find('.question');
        const answer = $(faqElement).find('.answer');
        if (question.text().toLowerCase().includes(searchTerm) || answer.text().toLowerCase().includes(searchTerm)) {
          $(faqElement).show()
        } else {
          $(faqElement).hide()
          hiddenFAQs++
        }
      })
      // toggle .no-faq-items-found if number of faq-items is equal to hiddenFAQs
      $(cardElement).find('.no-faq-items-found').toggle($(cardElement).find('.faq-item').length === hiddenFAQs);
      // if topicTitle contains searchTerm || card .faq-item count greater than hiddenFAQs
      if (topicTitle.text().toLowerCase().includes(searchTerm) || $(cardElement).find('.faq-item').length > hiddenFAQs) {
        $(cardElement).removeClass('d-none')
        faqTopicsShowing[index] = true
      } else {
        $(cardElement).addClass('d-none')
        faqTopicsShowing[index] = false
      }
    })
    // toggle .no-faq-results-found if there are no #faqAccordion .card without class d-none
    $('.no-faq-results-found').toggle($('#faqAccordion .card:not(.d-none)').length === 0);
  },
  showFirstAccordion: function() {
    // collapse all accordion
    $('[data-parent="#faqAccordion"]').collapse('hide')
    // expand first accordion that does NOT have d-none class
    $('#faqAccordion .card:not(.d-none) [data-toggle="collapse"]').first().attr('aria-expanded', 'true')
    $('#faqAccordion .card:not(.d-none) [data-parent="#faqAccordion"]').first().attr('class', 'hide collapse show')
  },
};
