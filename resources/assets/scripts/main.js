// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

import { Login } from './layouts/Login';
// import { Register } from './layouts/Register';
// import { Announcement } from './layouts/Announcement';
import { LeftStickyMenu } from './layouts/leftStickyMenu';
import { CookiePolicy } from './layouts/CookiePolicy';
import { QuickView } from './layouts/QuickView';
import { Splash } from './modules/Splash';
import { Home } from './modules/Home';
// import { ArchiveProduct } from './modules/ArchiveProduct';
import { Product } from './modules/Product';

// Load Events
jQuery(document).ready(() => {
	$(document).ready(function() {
    // layouts
		Login.onLoad();
		// Register.onLoad();
		// Announcement.onLoad();
    LeftStickyMenu.onLoad();
    CookiePolicy.onLoad();
    QuickView.onLoad();
    // modules
    Splash.onLoad();
    Home.onLoad();
    // ArchiveProduct.onLoad();
    Product.onLoad();
	});
});
