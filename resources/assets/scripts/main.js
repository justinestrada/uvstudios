// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

import { Login } from './layouts/login';
import { Register } from './layouts/register';
// import { Announcement } from './layouts/announcement';
import { LeftStickyMenu } from './layouts/leftStickyMenu';
import { CookiePolicy } from './layouts/CookiePolicy';
import { QuickView } from './layouts/quickView';
import { Splash } from './modules/Splash';
import { Home } from './modules/Home';
import { Product } from './modules/Product';

// Load Events
jQuery(document).ready(() => {
	$(document).ready(function() {
    // layouts
		Login.onLoad();
		Register.onLoad();
		// Announcement.onLoad();
    LeftStickyMenu.onLoad();
    CookiePolicy.onLoad();
    QuickView.onLoad();
    // modules
    Splash.onLoad();
    Home.onLoad();
    Product.onLoad();
	});
});
