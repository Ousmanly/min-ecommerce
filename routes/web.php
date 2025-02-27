<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\PorductController;
use App\Http\Controllers\User\UserCategoryController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserProductController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::controller(WelcomeController::class)->group(function () {
    Route::get('/', 'indexVisitor')->name('welcome');
});


// Route::get('/dashboard', [WelcomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


////////////////////
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(WelcomeController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/dashboard', 'getTotal')->name('dashboard');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category', 'index')->name('category.index');
            Route::get('/category/create', 'create')->name('category.create');
            Route::post('/category', 'store')->name('category.store');
            Route::get('/category/{category}', 'show')->name('category.show');
            Route::get('/category/{category}/edit', 'edit')->name('category.edit');
            Route::put('/category/{category}', 'update')->name('category.update');
            Route::delete('/category/{category}', 'destroy')->name('category.destroy');
        });

        Route::controller(PorductController::class)->group(function () {
            Route::get('/product', 'index')->name('product.index');
            Route::get('/product/create', 'create')->name('product.create');
            Route::post('/product', 'store')->name('product.store');
            Route::get('/product/{product}', 'show')->name('product.show');
            Route::get('/product/{product}/edit', 'edit')->name('product.edit');
            Route::put('/product/{product}', 'update')->name('product.update');
            Route::delete('/product/{product}', 'destroy')->name('product.destroy');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::get('/order', 'index')->name('order.index');
            Route::get('/order/{product}', 'create')->name('order.create');
            Route::post('/order', 'store')->name('order.store');
            Route::patch('/order/{order}/update-status', 'updateStatus')->name('order.updateStatus');
        });

    });
});


////////////// user
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::controller(WelcomeController::class)->group(function () {
            Route::get('/dashboard', 'indexUser')->name('user');
        });
        Route::controller(UserCategoryController::class)->group(function () {
            Route::get('/category', 'index')->name('user.category.index');
        });
        
        Route::controller(UserProductController::class)->group(function () {
            Route::get('/product', 'index')->name('user.product.index');
        });
        
        Route::controller(UserOrderController::class)->group(function () {
            // Route::get('/order', 'index')->name('order.index');
            Route::get('/order/{product}', 'create')->name('user.order.create');
            Route::post('/order', 'store')->name('user.order.store');
            // Route::patch('/order/{order}/update-status', 'updateStatus')->name('order.updateStatus');
        });

        Route::controller(UserOrderController::class)->group(function () {

            Route::get('/products/category/{id}', 'showByCategoryU')->name('user.products.byCategory');
        
        });


    });
});

Route::controller(UserOrderController::class)->group(function () {

    Route::get('/products/category/{id}', 'showByCategory')->name('visitor.products.byCategory');

});

Route::controller(WelcomeController::class)->group(function () {
    Route::get('/dashboard', 'indexVisitor')->name('visitor');
});

Route::controller(UserCategoryController::class)->group(function () {
    Route::get('/category', 'indexVisitor')->name('visitor.category.index');
});

Route::controller(UserProductController::class)->group(function () {
    Route::get('/product', 'indexVisitor')->name('visitor.product.index');
});

Route::controller(UserOrderController::class)->group(function () {
    Route::get('/order/{product}', 'createVisitor')->name('visitor.order.create');
    Route::post('/order', 'storeVisitor')->name('visitor.order.store');
});




























///////////////////



// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


Route::controller(NodeController::class)->group(function () {
    Route::get('/note', 'index')->name('note.index');
    Route::get('/note/create', 'create')->name('note.create');
    Route::post('/note', 'store')->name('note.store');
    Route::get('/note/{note}', 'show')->name('note.show');
    Route::get('/note/{note}/edit', 'edit')->name('note.edit');
    Route::put('/note/{note}', 'update')->name('note.update');
    Route::delete('/note/{note}', 'destroy')->name('note.destroy');
});


// Route::resource('note', NodeController::class);
require __DIR__ . '/auth.php';
