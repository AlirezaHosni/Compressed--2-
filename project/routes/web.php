<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\front\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// FrontEnd Route //
// Route::get('/','IndexController@index')->name('show');
Route::namespace('front')->get('/', "front\HomeController@index")->name('index');


Route::resource('/user','front\UserController');
// End FrontEnd Route //



Auth::routes();
// BackEnd Route--UserManagement //
Route::middleware('auth')->prefix('administrator')->group(function (){
    // dashboard //
    Route::get('/dashboard', 'HomeController@index')->name('home');
    // Role //
    Route::resource('/role',RoleController::class);
    // Permission  //
    Route::resource('/permission',PermissionController::class);
    // User Management  //
    Route::resource('/userManagement',UserManagementController::class);
    // Upload User Image //
    Route::post('/userManagement/editImage/{id}','UserManagementController@editImage')->name('editImage');
});
// End BackEnd Route--UserManagement //
//  BackEnd Route--content management  //
Route::middleware('auth')->prefix('administrator')->group(function (){
    // Menu //
    Route::resource('/menus','MenuController');
    // SubMenu //
    Route::resource('/submenus','subMenuController');
    Route::post('/submenus/{id}','MenuController@createMenu')->name('createMenu');
    // Article Group //
    Route::resource('/articleGroup','ArticleGroupController');
    // Tags //
    Route::resource('/tags','TagController');
    // Article //
    Route::resource('/article','ArticleController');
    Route::get('/article/Details/{url}','ArticleController@Details')->name('article.details');
    Route::get('/telegram/{id}','ArticleController@Telegram')->name('article.telegram');
    // Soft Delete Article //
    Route::get('/trashArticle','ArticleController@trashArticle')->name('Trash.Article');
    Route::delete('/trashDestroy/{id}','ArticleController@trashDestroy')->name('Trash.Destroy');
    Route::post('/trashRestore/{id}','ArticleController@trashRestore')->name('Trash.Restore');
    // Start Magazine //
    Route::resource('/magazine','MagazineController');
    // Start Landing //
    Route::resource('landing','LandingController');
    Route::get('/trashLanding','LandingController@trashLanding')->name('trashLanding');
    Route::delete('/destroyLanding/{id}','LandingController@destroyLanding')->name('destroyLanding');
    Route::post('/restoreLanding/{id}','LandingController@restoreLanding')->name('restoreLanding');
    // Advertise //
    Route::resource('/advertise','AdvertiseController');
    // Analysis //
    Route::resource('/analysis','AnalysisController');
    Route::get('/analysis/telegram/{id}','AnalysisController@Telegram')->name('analysis.telegram');
    Route::get('/analysis/Details/{url}','AnalysisController@Details')->name('analysis.details');
    // Soft Delete Analysis //
    Route::get('/trashAnalysis','AnalysisController@trashAnalysis')->name('Trash.Analysis');
    Route::delete('/trashDestroy/{id}','AnalysisController@trashDestroy')->name('analysis.Trash.Destroy');
    Route::post('/trashRestore/{id}','AnalysisController@trashRestore')->name('analysis.Trash.Restore');
    // Comment //
    Route::resource('/comment','CommentController');
    Route::get('/comment/active/{id}','CommentController@activeComment')->name('activeComment');
    Route::post('/comment/{article}','CommentController@storeComment')->name('comment.storeComment');
    Route::get('/answerComment/{id}','CommentController@answerComment')->name('answerComment');
});

Route::prefix('/news')->group(function(){
    Route::get('/', function(){
        return 'here is news route';
    })->name('news');
    Route::get('/fundamental', function(){
        return 'here is fundamental route';
    })->name('news.fundamental');
    Route::prefix('/goods')->group(function(){
        Route::get('/', function(){
            return 'here is goods route';
        })->name('news.goods');
        Route::get('/fundamental', function(){
            return 'here is fundamental goods route';
        })->name('news.goods.fundamental');
        Route::get('/goods', function(){
            return 'here is goods route';
        })->name('news.goods.goods');
    });
    Route::get('/test', function(){
        return 'here is test route';
    })->name('news.test');
});

// streams
Route::namespace('front')->get('/stream/{articleGroup?}', "front\StreamController@index")->name('stream.index');

// show magazines
Route::get('/magazine', 'MagazineController@showMagazines')->name('showMagazines');

// get latest article
Route::get('/latest-article/{article}', 'ArticleController@latestArticle')->name('latestArticle');

// download magazine
Route::get('/download-magazine/{magazine}', 'MagazineController@downloadMagazine')->name('downloadMagazine');


Route::prefix('/category')->group(function (){
    Route::get('/NFT', 'front\ArticleMenuController@index')->name('NFT.index');
    Route::get('/Metaverse', 'front\ArticleMenuController@index')->name('Metaverse.index');
    Route::prefix('/news')->group(function (){
        Route::get('', 'front\ArticleMenuController@index')->name('news.index');
        Route::get('/politic', 'front\ArticleMenuController@index')->name('news.politic.index');
        Route::get('/Economy', 'front\ArticleMenuController@index')->name('news.economy.index');
        Route::get('/tech', 'front\ArticleMenuController@index')->name('news.tech.index');
        Route::get('/covid', 'front\ArticleMenuController@index')->name('news.covid.index');
        Route::get('/banks', 'front\ArticleMenuController@index')->name('news.banks.index');
        Route::get('/banks', 'front\ArticleMenuController@index')->name('news.banks.index');
    });
    Route::prefix('/Analysis')->group(function (){
        Route::get('', 'front\ArticleMenuController@index')->name('front.analysis.index');
        Route::get('/fundamental', 'front\ArticleMenuController@index')->name('analysis.fundamental.index');
        Route::get('/Send', 'front\ArticleMenuController@index')->name('analysis.Send.index');
        Route::prefix('/commodities')->group(function (){
            Route::get('', 'front\ArticleMenuController@index')->name('analysis.commodities.index');
            Route::get('/gold', 'front\ArticleMenuController@index')->name('analysis.commodities.gold.index');
            Route::get('/WTI', 'front\ArticleMenuController@index')->name('analysis.commodities.WTI.index');
            Route::get('/silver', 'front\ArticleMenuController@index')->name('analysis.commodities.silver.index');
            Route::get('/gas', 'front\ArticleMenuController@index')->name('analysis.commodities.gas.index');
        });
        Route::prefix('/forex')->group(function (){
            Route::get('', 'front\ArticleMenuController@index')->name('analysis.forex.index');
            Route::get('/EUR', 'front\ArticleMenuController@index')->name('analysis.forex.EUR.index');
            Route::get('/GBP', 'front\ArticleMenuController@index')->name('analysis.forex.GBP.index');
            Route::get('/JPY', 'front\ArticleMenuController@index')->name('analysis.forex.JPY.index');
            Route::get('/CNH', 'front\ArticleMenuController@index')->name('analysis.forex.CNH.index');
            Route::get('/AUD', 'front\ArticleMenuController@index')->name('analysis.forex.AUD.index');
            Route::get('/NZD', 'front\ArticleMenuController@index')->name('analysis.forex.NZD.index');
            Route::get('/TRY', 'front\ArticleMenuController@index')->name('analysis.forex.TRY.index');
            Route::get('/CAD', 'front\ArticleMenuController@index')->name('analysis.forex.CAD.index');
            Route::get('/RUB', 'front\ArticleMenuController@index')->name('analysis.forex.RUB.index');
            Route::get('/USD', 'front\ArticleMenuController@index')->name('analysis.forex.USD.index');
        });
        Route::prefix('/STOCKS')->group(function (){
            Route::get('', 'front\ArticleMenuController@index')->name('analysis.STOCKS.index');
            Route::get('/SP500', 'front\ArticleMenuController@index')->name('analysis.STOCKS.SP500.index');
            Route::get('/DJI', 'front\ArticleMenuController@index')->name('analysis.STOCKS.DJI.index');
            Route::get('/NASDAQ', 'front\ArticleMenuController@index')->name('analysis.STOCKS.NASDAQ.index');
            Route::get('/DAX', 'front\ArticleMenuController@index')->name('analysis.STOCKS.DAX.index');
            Route::get('/EURO600-50', 'front\ArticleMenuController@index')->name('analysis.STOCKS.EURO600-50.index');
            Route::get('/UK100', 'front\ArticleMenuController@index')->name('analysis.STOCKS.UK100.index');
            Route::get('/CAC40', 'front\ArticleMenuController@index')->name('analysis.STOCKS.CAC40.index');
            Route::get('/Nikkei225', 'front\ArticleMenuController@index')->name('analysis.STOCKS.Nikkei225.index');
            Route::get('/Russell2000', 'front\ArticleMenuController@index')->name('analysis.STOCKS.Russell2000.index');
            Route::get('/SSE', 'front\ArticleMenuController@index')->name('analysis.STOCKS.SSE.index');
            Route::get('/HSI', 'front\ArticleMenuController@index')->name('analysis.STOCKS.HSI.index');
            Route::get('/Wall_Street', 'front\ArticleMenuController@index')->name('analysis.STOCKS.Wall_Street.index');
            Route::get('/Earnings', 'front\ArticleMenuController@index')->name('analysis.STOCKS.Earnings.index');
        });

    });
    Route::prefix('/Crypto')->group(function () {
        Route::get('', 'front\ArticleMenuController@index')->name('Crypto.index');
        Route::get('/News', 'front\ArticleMenuController@index')->name('Crypto.News.index');
        Route::prefix('/Parachain')->group(function () {
            Route::get('', 'front\ArticleMenuController@index')->name('Crypto.Parachain.index');
            Route::get('/DOT', 'front\ArticleMenuController@index')->name('Crypto.Parachain.DOT.index');
            Route::get('/KSM', 'front\ArticleMenuController@index')->name('Crypto.Parachain.KSM.index');
        });
        Route::prefix('/analysis')->group(function () {
            Route::get('', 'front\ArticleMenuController@index')->name('Crypto.analysis.index');
            Route::get('/On-Chain', 'front\ArticleMenuController@index')->name('Crypto.analysis.On-Chain.index');
            Route::get('/BTC', 'front\ArticleMenuController@index')->name('Crypto.analysis.BTC.index');
            Route::get('/XRP', 'front\ArticleMenuController@index')->name('Crypto.analysis.XRP.index');
            Route::get('/ETH', 'front\ArticleMenuController@index')->name('Crypto.analysis.ETH.index');
            Route::get('/SOL', 'front\ArticleMenuController@index')->name('Crypto.analysis.SOL.index');
            Route::get('/LTC', 'front\ArticleMenuController@index')->name('Crypto.analysis.LTC.index');
            Route::get('/DOGE', 'front\ArticleMenuController@index')->name('Crypto.analysis.DOGE.index');
            Route::get('/EOS', 'front\ArticleMenuController@index')->name('Crypto.analysis.EOS.index');
            Route::get('/ADA', 'front\ArticleMenuController@index')->name('Crypto.analysis.ADA.index');
            Route::get('/SHIB', 'front\ArticleMenuController@index')->name('Crypto.analysis.SHIB.index');
            Route::get('/BNB', 'front\ArticleMenuController@index')->name('Crypto.analysis.BNB.index');
            Route::get('/USDT', 'front\ArticleMenuController@index')->name('Crypto.analysis.USDT.index');
            Route::get('/banks', 'front\ArticleMenuController@index')->name('Crypto.analysis.banks.index');
        });
    });
    Route::prefix('/Market_Outlook')->group(function () {
        Route::get('', 'front\ArticleMenuController@index')->name('Market_Outlook.index');
        Route::get('/Daily', 'front\ArticleMenuController@index')->name('Daily.index');
        Route::get('/Weekly', 'front\ArticleMenuController@index')->name('Weekly.index');
        Route::get('/Monthly', 'front\ArticleMenuController@index')->name('Monthly.index');
    });
});
Route::get('/EconomicCalendar', 'front\ArticleMenuController@index')->name('EconomicCalendar.index');
Route::get('/alltahlil', 'front\ArticleMenuController@allTahlil')->name('alltahlil.index');
Route::get('/alltahlil/{analysis}', 'front\ArticleMenuController@allTahlilShow')->name('alltahlil.show');
Route::get('https://login.ifcmtrade.com/fa/register/ib/6034', 'front\ArticleMenuController@index')->name('IFCMarkets.index');
Route::get('/164', 'front\ArticleMenuController@index')->name('HowToSendAnalysis.index');
Route::get('/live-news-ukraine', 'front\ArticleMenuController@index')->name('ukraineWar.index');
Route::get('/specialreport', 'front\ArticleMenuController@index')->name('specialReport.index');
Route::get('/authors', 'front\ArticleMenuController@authors')->name('authors.index');
Route::get('/authors/{author}', 'front\ArticleMenuController@authorsShow')->name('authors.show');
Route::get('https://myaccount.opofinance.com/links/go/74', 'front\ArticleMenuController@index')->name('OppoFinance.index');

Route::get('https://www.instagram.com/proskillsnews/',function(){
    return 'here is instagram route';
})->name('instagram');

Route::get('https://twitter.com/Proskillsnews',function(){
    return 'here is twitter route';
})->name('twitter');

Route::get('https://www.youtube.com/c/ProfessionalTradingSkills',function(){
    return 'here is youtube route';
})->name('youtube');

Route::get('https://www.facebook.com/proskills.fa',function(){
    return 'here is facebook route';
})->name('facebook');

Route::get('https://t.me/proskillsnews',function(){
    return 'here is telegram route';
})->name('telegram');

Route::get('https://www.linkedin.com/in/ahura-r-chalki-9608b015a/',function(){
    return 'here is linkedin route';
})->name('linkedin');

// بروگرها
Route::get('https://secure.bkfx.io/links/go/760',function(){
    return 'here is bkFx route';
})->name('bkFx');

Route::get('/dfc',function(){
    return 'here is dfc route';
})->name('dfc');

Route::get('https://signup.topfx.com.bm/Registration/Main/Account?dest=live&camp=4043',function(){
    return 'here is Topfx route';
})->name('Topfx');

Route::get('https://account.nordfxfarsi.com/account/register/?id=1613135&lang=ir',function(){
    return 'here is nordFx route';
})->name('nordFx');

Route::get('/ironFx',function(){
    return 'here is ironFx route';
})->name('ironFx');






// footer
Route::get('/terms',function(){

})->name('terms');

Route::get('/faq',function(){
    return 'here is faq route';
})->name('faq');

Route::get('/price-analysis',function(){
    return 'here is priceAnalysis route';
})->name('priceAnalysis');

Route::get('/bitcoins-price-analysis',function(){
    return 'here is bitcoinsPriceAnalysis route';
})->name('bitcoinsPriceAnalysis');

Route::get('/others-price-analysis',function(){
    return 'here is othersPriceAnalysis route';
})->name('othersPriceAnalysis');

Route::get('/bitcoins-price-analysis',function(){
    return 'here is bitcoinsPriceAnalysis route';
})->name('bitcoinsPriceAnalysis');

Route::get('/fundamental-analysis',function(){
    return 'here is fundamental-analysis route';
})->name('fundamentalAnalysis');

Route::get('/contact-us',function(){
    return 'here is contact us route';
})->name('contactUs');

Route::get('/about-us',function(){
    return 'here is fundamental-analysis route';
})->name('aboutUs');

Route::get('/jobs-opportunities',function(){
    return 'here is job opportunities route';
})->name('jobsOpportunities');






// show single article
Route::get('/{article}', 'ArticleController@singleArticle')->name('singleArticle')->where('article', '\d+');
