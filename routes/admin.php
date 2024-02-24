<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BlogcategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BlogtagController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\CoachingMethodController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ImagePresetsController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenugroupController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\backend\SocialController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\Backend\UserRoleController;
use App\Http\Controllers\Backend\CanProvideController;
use App\Http\Controllers\Backend\CoachController;
use App\Http\Controllers\Backend\CoachedOrganizationController;
use App\Http\Controllers\Backend\CoachThemeController;
use App\Http\Controllers\Backend\HeldPositionController;
use App\Http\Controllers\Backend\LanguagesController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

// Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->prefix('admin')->group(function () {
    // Admin Dashboard All Routes
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'AdminDashboard')->name('admin.dashboard');
        // Admin User All Route 
        Route::get('/all/admin', 'AllAdmin')->name('all.admin');
        Route::get('/add/admin', 'AddAdmin')->name('add.admin');
        Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
        Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::post('/delete/admin', 'DeleteAdmin')->name('delete.admin');
    });
    // Menu All Routes
    Route::resource('menugroup', MenugroupController::class)->middleware('can:menugroup.index, menugroup.create, menugroup.update');
    Route::post('/menugroup/delete', [MenugroupController::class, 'Delete'])->middleware('can:menugroup.delete')->name('menugroup.delete');
    // Menu All Routes
    Route::resource('menus', MenuController::class)->middleware('can:menus.index, menus.create, menus.update');
    Route::post('/menus/status', [MenuController::class, 'StatusUpdate'])->middleware('can:menus.status')->name('menus.status');
    Route::post('/menus/delete', [MenuController::class, 'Delete'])->middleware('can:menus.delete')->name('menus.delete');
    // Menu All Routes
    Route::resource('pages', PageController::class)->middleware('can:pages.index, pages.create, pages.update');
    Route::post('/pages/status', [PageController::class, 'StatusUpdate'])->middleware('can:pages.status')->name('pages.status');
    Route::post('/pages/delete', [PageController::class, 'DeletewithImage'])->middleware('can:pages.delete')->name('pages.delete');

    // Module All Routes
    Route::resource('modules', ModuleController::class)->middleware('can:module.index, module.create, module.update');
    Route::post('/modules/status', [ModuleController::class, 'StatusUpdate'])->middleware('can:module.status')->name('modules.status');
    Route::post('/modules/delete', [ModuleController::class, 'DeletewithImage'])->middleware('can:module.delete')->name('modules.delete');

    // Slider All Routes
    Route::resource('sliders', SliderController::class)->middleware('can:sliders.index, sliders.create, sliders.update');
    Route::post('/sliders/status', [SliderController::class, 'StatusUpdate'])->middleware('can:sliders.status')->name('sliders.status');
    Route::post('/sliders/delete', [SliderController::class, 'Delete'])->middleware('can:sliders.delete')->name('sliders.delete');

    // Testimonials All Routes
    Route::resource('testimonials', TestimonialController::class)->middleware('can:testimonials.index, testimonials.create, testimonials.update');
    Route::post('/testimonials/status', [TestimonialController::class, 'StatusUpdate'])->middleware('can:testimonials.status')->name('testimonials.status');
    Route::post('/testimonials/delete', [TestimonialController::class, 'DeletewithImage'])->middleware('can:testimonials.delete')->name('testimonials.delete');

    // Social All Routes
    Route::resource('social', SocialController::class)->middleware('can:social.index, social.create, social.update');
    Route::post('/social/status', [SocialController::class, 'StatusUpdate'])->middleware('can:social.status')->name('social.status');    
    Route::post('/social/delete', [SocialController::class, 'Delete'])->middleware('can:social.delete')->name('social.delete');

    // Blog All Routes
    Route::resource('blog', BlogController::class)->middleware('can:blog.index, blog.create, blog.update');
    Route::post('/blog/status', [BlogController::class, 'StatusUpdate'])->middleware('can:blog.status')->name('blog.status');
    Route::post('/blog/delete', [BlogController::class, 'Delete'])->middleware('can:blog.delete')->name('blog.delete');

    Route::resource('post/category', BlogcategoryController::class)->middleware('can:category.index, category.create, category.update');
    Route::post('post/category/delete', [BlogcategoryController::class, 'Delete'])->middleware('can:category.delete')->name('category.delete');
    Route::resource('post/tag', BlogtagController::class)->middleware('can:tag.index, tag.create, tag.update');
    Route::post('post/tag/delete', [BlogtagController::class, 'Delete'])->middleware('can:tag.delete')->name('tag.delete');
    // Image Preset All Routes
    Route::resource('image_preset', ImagePresetsController::class)->middleware('can:image_preset.index, image_preset.create, image_preset.update');
    Route::post('/image_preset/status', [ImagePresetsController::class, 'StatusUpdate'])->middleware('can:image_preset.status')->name('image_preset.status');
    Route::post('/image_preset/delete', [ImagePresetsController::class, 'Delete'])->middleware('can:image_preset.delete')->name('image_preset.delete');

    // Categories All Routes
    Route::resource('categories', CategoriesController::class)->middleware('can:categories.index, categories.create, categories.update');
    Route::post('/categories/status', [CategoriesController::class, 'StatusUpdate'])->middleware('can:categories.status')->name('categories.status');
    Route::post('/categories/delete', [CategoriesController::class, 'DeletewithImage'])->middleware('can:categories.delete')->name('categories.delete');
    Route::get('/import/categories', [CategoriesController::class, 'ImportCategories'])->name('import.categories');
    Route::get('/exportcategory', [CategoriesController::class, 'Export'])->name('export.category');
    Route::post('/importcategory', [CategoriesController::class, 'Import'])->name('import.category');

    // Coached Organizations All Routes
    Route::resource('coached_organizations', CoachedOrganizationController::class)->middleware('can:coached_organizations.index, languages.create, coached_organizations.update');
    Route::post('/coached_organizations/status', [CoachedOrganizationController::class, 'StatusUpdate'])->middleware('can:coached_organizations.status')->name('coached_organizations.status');
    Route::post('/coached_organizations/delete', [CoachedOrganizationController::class, 'Delete'])->middleware('can:coached_organizations.delete')->name('coached_organizations.delete');
    Route::get('/import/coached_organizations', [CoachedOrganizationController::class, 'ImportCoachedOrganization'])->name('import.coached_organizations');
    Route::get('/exportorganization', [CoachedOrganizationController::class, 'Export'])->name('export.coached_organization');
    Route::post('/importorganization', [CoachedOrganizationController::class, 'Import'])->name('import.coached_organization');

    // Coaching Methods All Routes
    Route::resource('coaching_methods', CoachingMethodController::class)->middleware('can:coaching_methods.index, coaching_methods.create, coaching_methods.update');
    Route::post('/coaching_methods/status', [CoachingMethodController::class, 'StatusUpdate'])->middleware('can:coaching_methods.status')->name('coaching_methods.status');
    Route::post('/coaching_methods/delete', [CoachingMethodController::class, 'Delete'])->middleware('can:coaching_methods.delete')->name('coaching_methods.delete');
    Route::get('/import/coaching_methods', [CoachingMethodController::class, 'ImportCoachingMethod'])->name('import.coaching_methods');
    Route::get('/exportcoaching_methods', [CoachingMethodController::class, 'Export'])->name('export.coaching_method');
    Route::post('/importcoaching_methods', [CoachingMethodController::class, 'Import'])->name('import.coaching_method');
    
    // Can Provide All Routes
    Route::resource('can_provides', CanProvideController::class)->middleware('can:can_provides.index, can_provides.create, can_provides.update');
    Route::post('/can_provides/status', [CanProvideController::class, 'StatusUpdate'])->middleware('can:can_provides.status')->name('can_provides.status');
    Route::post('/can_provides/delete', [CanProvideController::class, 'Delete'])->middleware('can:can_provides.delete')->name('can_provides.delete');
    Route::get('/import/can_provides', [CanProvideController::class, 'ImportCanProvide'])->name('import.can_provides');
    Route::get('/exportprovide', [CanProvideController::class, 'Export'])->name('export.can_provide');
    Route::post('/importprovide', [CanProvideController::class, 'Import'])->name('import.can_provide');

    // Coach Theme All Routes
    Route::resource('coach_themes', CoachThemeController::class)->middleware('can:coach_themes.index, coach_themes.create, coach_themes.update');
    Route::post('/coach_themes/status', [CoachThemeController::class, 'StatusUpdate'])->middleware('can:coach_themes.status')->name('coach_themes.status');
    Route::post('/coach_themes/delete', [CoachThemeController::class, 'Delete'])->middleware('can:coach_themes.delete')->name('coach_themes.delete');
    Route::get('/import/coach_themes', [CoachThemeController::class, 'ImportCoachingMethod'])->name('import.coach_themes');
    Route::get('/exporttheme', [CoachThemeController::class, 'Export'])->name('export.coach_theme');
    Route::post('/importtheme', [CoachThemeController::class, 'Import'])->name('import.coach_theme');

    // Held Position All Routes
    Route::resource('held_positions', HeldPositionController::class)->middleware('can:held_positions.index, coach_themes.create, held_positions.update');
    Route::post('/held_positions/status', [HeldPositionController::class, 'StatusUpdate'])->middleware('can:held_positions.status')->name('held_positions.status');
    Route::post('/held_positions/delete', [HeldPositionController::class, 'Delete'])->middleware('can:held_positions.delete')->name('held_positions.delete');
    Route::get('/import/held_positions', [HeldPositionController::class, 'ImportHeldPosition'])->name('import.held_positions');
    Route::get('/exportposition', [HeldPositionController::class, 'Export'])->name('export.held_position');
    Route::post('/importposition', [HeldPositionController::class, 'Import'])->name('import.held_position');

    // Languages All Routes
    Route::resource('languages', LanguagesController::class)->middleware('can:languages.index, languages.create, languages.update');
    Route::post('/languages/status', [LanguagesController::class, 'StatusUpdate'])->middleware('can:languages.status')->name('languages.status');
    Route::post('/languages/delete', [LanguagesController::class, 'Delete'])->middleware('can:languages.delete')->name('languages.delete');
    Route::get('/import/languages', [LanguagesController::class, 'ImportLanguages'])->name('import.languages');
    Route::get('/exportlanguage', [LanguagesController::class, 'Export'])->name('export.language');
    Route::post('/importlanguage', [LanguagesController::class, 'Import'])->name('import.language');
   
    // Locations All Routes
    Route::resource('locations', LocationController::class)->middleware('can:locations.index, locations.create, languages.update');
    Route::post('/locations/status', [LocationController::class, 'StatusUpdate'])->middleware('can:locations.status')->name('locations.status');
    Route::post('/locations/delete', [LocationController::class, 'Delete'])->middleware('can:locations.delete')->name('locations.delete');
    Route::get('/import/locations', [LocationController::class, 'ImportLocations'])->name('import.locations');
    Route::get('/exportlocation', [LocationController::class, 'Export'])->name('export.location');
    Route::post('/importlocation', [LocationController::class, 'Import'])->name('import.location');

    // Coaches All Routes
    Route::resource('coaches', CoachController::class)->middleware('can:coaches.index, coaches.create, coaches.update');
    Route::post('/coaches/status', [CoachController::class, 'StatusUpdate'])->middleware('can:coaches.status')->name('coaches.status');
    Route::post('/coaches/delete', [CoachController::class, 'DeletewithImage'])->middleware('can:coaches.delete')->name('coaches.delete');
    Route::get('/import/coaches', [CoachController::class, 'ImportCoaches'])->name('import.coaches');
    Route::get('/exportcoach', [CoachController::class, 'Export'])->name('export.coach');
    Route::post('/importcoach', [CoachController::class, 'Import'])->name('import.coach');

    // SMTP and Site Setting  All Route 
    Route::controller(SettingController::class)->group(function () {
        Route::get('/site/setting', 'SiteSetting')->middleware('can:site.setting')->name('site.setting');
        Route::patch('/update/site/setting/{id}', 'UpdateSiteSetting')->name('update.site.setting');
        Route::get('/smtp/setting', 'SmtpSetting')->middleware('can:smtp.setting')->name('smtp.setting');
        Route::patch('/update/smpt/setting/{id}', 'UpdateSmtpSetting')->name('update.smpt.setting');
    });
    // Permission All Route 
    Route::resource('permission', RoleController::class)->middleware('can:permission.index, permission.create, permission.update');
    Route::post('/permission/delete', [RoleController::class, 'Delete'])->middleware('permission.delete')->name('permission.delete');

    Route::resource('roles', UserRoleController::class)->middleware('can:role.index, role.create, role.update');
    Route::post('/roles/delete', [UserRoleController::class, 'Delete'])->middleware('can:role.delete')->name('roles.delete');

    Route::controller(RoleController::class)->group(function () {
        Route::get('/import/permission/ajax_load', 'Ajax_Data')->name('permission.ajax_load');
        Route::get('/import/permission', 'ImportPermission')->name('import.permission');
        Route::get('/export', 'Export')->name('export');
        Route::post('/import', 'Import')->name('import');
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission',  'AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::post('/admin/delete', 'AdminDeleteRoles')->name('admin.delete.roles');
    });
    Route::controller(UserController::class)->group(function () {
        // User All Routes
        Route::get('/users', 'AllUsers')->name('admin.users');
        Route::get('/users/add', 'UserAdd')->name('admin.user_add');
        Route::post('/users/store', 'UserStore')->name('admin.user_store');
        Route::get('/users/edit/{id}', 'UserEdit')->name('admin.user_edit');
        Route::put('/users/update', 'UserUpdate')->name('admin.user_update');
        Route::put('/users/status', 'UserStatusUpdate')->name('admin.user_status');
        Route::delete('/users/delete/{id}', 'UserDelete')->name('admin.user_delete');
    });
});
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
// End Group Admin Middleware