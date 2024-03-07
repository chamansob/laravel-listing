 <div class="sidebar-wrapper sidebar-theme">

     <nav id="sidebar">

         <div class="navbar-nav theme-brand flex-row  text-center">
             <div class="nav-logo">
                 <div class="nav-item theme-logo">
                     <a href="./index.html">
                         <img src="{{ asset('backend/assets/src/assets/img/logo.svg') }}" class="navbar-logo"
                             alt="logo">
                     </a>
                 </div>
                 <div class="nav-item theme-text">
                     <a href="./index.html" class="nav-link"> Admin </a>
                 </div>
             </div>
             <div class="nav-item sidebar-toggle">
                 <div class="btn-toggle sidebarCollapse">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-chevrons-left">
                         <polyline points="11 17 6 12 11 7"></polyline>
                         <polyline points="18 17 13 12 18 7"></polyline>
                     </svg>
                 </div>
             </div>
         </div>
         <div class="shadow-bottom"></div>
         <ul class="list-unstyled menu-categories" id="accordionExample">
             <li class="menu active">
                 <a href="{{ route('admin.dashboard') }}" data-bs-toggle="collapse" aria-expanded="{{ is_active_route('admin/dashboard') }}"
                     class="dropdown-toggle">
                     <div class="">
                         <i data-feather="home"></i>
                         <span>Dashboard</span>
                     </div>
                     {{-- <div>
                         <i data-feather="chevron-right"></i>
                     </div> --}}
                 </a>
                 {{-- <ul class="collapse submenu list-unstyled {{ show_class('admin/dashboard') }}" id="dashboard"
                     data-bs-parent="#accordionExample">
                     <li class="active">
                         <a href="./index.html"> Analytics </a>
                     </li>
                     <li>
                         <a href="./index2.html"> Sales </a>
                     </li>
                 </ul> --}}
             </li>

             <li class="menu menu-heading">
                 <div class="heading">

                     <i data-feather="minus"></i>
                     <span>APPLICATIONS</span>
                 </div>
             </li>
             @if (Auth::user()->can('menus.menu'))
                 <li class="menu">
                     <a href="#menus" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/menus') }} {{ is_active_route('admin/menugroup') }}"
                         aria-controls="menu" class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Menu') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>

                     <ul class="collapse submenu list-unstyled {{ show_class('admin/menus') }} {{ show_class('admin/menugroup') }}"
                         id="menus" data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('menus.create'))
                             <li class="{{ active_class('admin/menus/create') }}">
                                 <a href="{{ route('menus.create') }}"> {{ __('Add Menus') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('menus.index'))
                             <li class="{{ active_class('admin/menus') }}">
                                 <a href="{{ route('menus.index') }}"> {{ __('Show Menus') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('menugroup.create'))
                             <li class="{{ active_class('admin/menugroup/create') }}">
                                 <a href="{{ route('menugroup.create') }}"> {{ __('Add Menu Group') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('menugroup.index'))
                             <li class="{{ active_class('admin/menugroup') }}">
                                 <a href="{{ route('menugroup.index') }}"> {{ __('Show Menu Group') }} </a>
                             </li>
                         @endif




                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('pages.menu'))
                 <li class="menu">
                     <a href="#pages" data-bs-toggle="collapse" aria-expanded="{{ is_active_route('admin/pages') }}"
                         aria-controls="pages" class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Pages') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>

                     <ul class="collapse submenu list-unstyled {{ show_class('admin/pages') }}" id="pages"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('pages.index'))
                             <li class="{{ active_class('admin/pages/create') }}">
                                 <a href="{{ route('pages.create') }}"> {{ __('Add Pages') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('pages.create'))
                             <li class="{{ active_class('admin/pages') }}">
                                 <a href="{{ route('pages.index') }}"> {{ __('Show Pages') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('image_preset.menu'))
                 <li class="menu">
                     <a href="#image" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/image_preset') }}" aria-controls="image_preset"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Image Preset') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>

                     <ul class="collapse submenu list-unstyled {{ show_class('admin/image_preset') }}" id="image"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('image_preset.create'))
                             <li class="{{ active_class('admin/image_preset/create') }}">
                                 <a href="{{ route('image_preset.create') }}"> {{ __('Add Image Preset') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('image_preset.index'))
                             <li class="{{ active_class('admin/image_preset') }}">
                                 <a href="{{ route('image_preset.index') }}"> {{ __('Show Image Preset') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('module.menu'))
                 <li class="menu">
                     <a href="#module" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/module') }}" aria-controls="module"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Module') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/module') }}" id="module"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('module.create'))
                             <li class="{{ active_class('admin/modules/create') }}">
                                 <a href="{{ route('modules.create') }}"> {{ __('Add Module') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('module.index'))
                             <li class="{{ active_class('admin/module') }}">
                                 <a href="{{ route('modules.index') }}"> {{ __('Show Module') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
              @if (Auth::user()->can('counters.menu'))
                 <li class="menu">
                     <a href="#counters" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/counters') }}" aria-controls="counters"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Counter') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/counters') }}" id="counters"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('counters.create'))
                             <li class="{{ active_class('admin/counters/create') }}">
                                 <a href="{{ route('counters.create') }}"> {{ __('Add Counter') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('counters.index'))
                             <li class="{{ active_class('admin/counters') }}">
                                 <a href="{{ route('counters.index') }}"> {{ __('Show Counter') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('sliders.menu'))
                 <li class="menu">
                     <a href="#sliders" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/sliders') }}" aria-controls="sliders"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Slider') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/sliders') }}" id="sliders"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('sliders.create'))
                             <li class="{{ active_class('admin/sliders/create') }}">
                                 <a href="{{ route('sliders.create') }}"> {{ __('Add Slider') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('sliders.index'))
                             <li class="{{ active_class('admin/sliders') }}">
                                 <a href="{{ route('sliders.index') }}"> {{ __('Show Slider') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
            
              @if (Auth::user()->can('testimonials.menu'))
                 <li class="menu">
                     <a href="#testimonials" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/testimonials') }}" aria-controls="testimonials"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Testimonials') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/testimonials') }}" id="testimonials"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('testimonials.create'))
                             <li class="{{ active_class('admin/testimonials/create') }}">
                                 <a href="{{ route('testimonials.create') }}"> {{ __('Add Testimonials') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('testimonials.index'))
                             <li class="{{ active_class('admin/testimonials') }}">
                                 <a href="{{ route('testimonials.index') }}"> {{ __('Show Testimonials') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('blog.menu'))
                 <li class="menu">
                     <a href="#blog" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/blog') }} {{ is_active_route('admin/post') }}"
                         aria-controls="blog" class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Blog') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>

                     <ul class="collapse submenu list-unstyled {{ show_class('admin/blog') }}  {{ show_class('admin/post') }}"
                         id="blog" data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('blog.create'))
                             <li class="{{ active_class('admin/blog/create') }}">
                                 <a href="{{ route('blog.create') }}"> {{ __('Add Blog') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('blog.index'))
                             <li class="{{ active_class('admin/blog') }}">
                                 <a href="{{ route('blog.index') }}"> {{ __('Show Blog') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('category.create'))
                             <li class="{{ active_class('admin/post/category/create') }}">
                                 <a href="{{ route('category.create') }}"> {{ __('Add Blog Category') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('category.index'))
                             <li class="{{ active_class('admin/post/category') }}">
                                 <a href="{{ route('category.index') }}"> {{ __('Show Blog Category') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('tag.create'))
                             <li class="{{ active_class('admin/post/tag/create') }}">
                                 <a href="{{ route('tag.create') }}"> {{ __('Add Blog Tag') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('tag.index'))
                             <li class="{{ active_class('admin/post/tag') }}">
                                 <a href="{{ route('tag.index') }}"> {{ __('Show Blog Tag') }} </a>
                             </li>
                         @endif

                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('categories.menu'))
                 <li class="menu">
                     <a href="#categories" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/categories') }}" aria-controls="categories"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Categories') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/categories') }}" id="categories"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('categories.create'))
                             <li class="{{ active_class('admin/categories/create') }}">
                                 <a href="{{ route('categories.create') }}"> {{ __('Add Category') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('categories.index'))
                             <li class="{{ active_class('admin/categories') }}">
                                 <a href="{{ route('categories.index') }}"> {{ __('Show Category') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('coached_organizations.menu'))
                 <li class="menu">
                     <a href="#coached_organizations" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/coached_organizations') }}" aria-controls="coached_organizations"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Coached Organization') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/coached_organizations') }}" id="coached_organizations"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('coached_organizations.create'))
                             <li class="{{ active_class('admin/coached_organizations/create') }}">
                                 <a href="{{ route('coached_organizations.create') }}"> {{ __('Add Coached Organization') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('coached_organizations.index'))
                             <li class="{{ active_class('admin/coached_organizations') }}">
                                 <a href="{{ route('coached_organizations.index') }}"> {{ __('Show Coached Organization') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('coaching_methods.menu'))
                 <li class="menu">
                     <a href="#coaching_methods" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/coaching_methods') }}" aria-controls="coaching_methods"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Coaching Methods') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/coaching_methods') }}" id="coaching_methods"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('coaching_methods.create'))
                             <li class="{{ active_class('admin/coaching_methods/create') }}">
                                 <a href="{{ route('coaching_methods.create') }}"> {{ __('Add Coaching Methods') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('coaching_methods.index'))
                             <li class="{{ active_class('admin/coaching_methods') }}">
                                 <a href="{{ route('coaching_methods.index') }}"> {{ __('Show Coaching Methods') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('can_provides.menu'))
                 <li class="menu">
                     <a href="#can_provides" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/can_provides') }}" aria-controls="can_provides"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Can Provides') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/can_provides') }}" id="can_provides"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('can_provides.create'))
                             <li class="{{ active_class('admin/can_provides/create') }}">
                                 <a href="{{ route('can_provides.create') }}"> {{ __('Add Can Provides') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('can_provides.index'))
                             <li class="{{ active_class('admin/can_provides') }}">
                                 <a href="{{ route('can_provides.index') }}"> {{ __('Show Can Provides') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('coach_themes.menu'))
                 <li class="menu">
                     <a href="#coach_themes" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/coach_themes') }}" aria-controls="coach_themes"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Coach Themes') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/coach_themes') }}" id="coach_themes"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('coach_themes.create'))
                             <li class="{{ active_class('admin/coach_themes/create') }}">
                                 <a href="{{ route('coach_themes.create') }}"> {{ __('Add Coach Themes') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('coach_themes.index'))
                             <li class="{{ active_class('admin/coach_themes') }}">
                                 <a href="{{ route('coach_themes.index') }}"> {{ __('Show Coach Themes') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
              @if (Auth::user()->can('held_positions.menu'))
                 <li class="menu">
                     <a href="#held_positions" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/held_positions') }}" aria-controls="held_positions"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Held Positions') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/held_positions') }}" id="held_positions"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('held_positions.create'))
                             <li class="{{ active_class('admin/held_positions/create') }}">
                                 <a href="{{ route('held_positions.create') }}"> {{ __('Add Held Positions') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('held_positions.index'))
                             <li class="{{ active_class('admin/held_positions') }}">
                                 <a href="{{ route('held_positions.index') }}"> {{ __('Show Held Positions') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
              @if (Auth::user()->can('languages.menu'))
                 <li class="menu">
                     <a href="#languages" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/languages') }}" aria-controls="languages"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Languages') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/languages') }}" id="languages"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('languages.create'))
                             <li class="{{ active_class('admin/languages/create') }}">
                                 <a href="{{ route('languages.create') }}"> {{ __('Add Languages') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('languages.index'))
                             <li class="{{ active_class('admin/languages') }}">
                                 <a href="{{ route('languages.index') }}"> {{ __('Show Languages') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('locations.menu'))
                 <li class="menu">
                     <a href="#locations" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/locations') }}" aria-controls="locations"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Location') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/locations') }}" id="locations"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('locations.create'))
                             <li class="{{ active_class('admin/locations/create') }}">
                                 <a href="{{ route('locations.create') }}"> {{ __('Add Location') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('locations.index'))
                             <li class="{{ active_class('admin/locations') }}">
                                 <a href="{{ route('locations.index') }}"> {{ __('Show Location') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
              @if (Auth::user()->can('coaches.menu'))
                 <li class="menu">
                     <a href="#coaches" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/coaches') }}" aria-controls="coaches"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Coaches') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/coaches') }}" id="coaches"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('coaches.create'))
                             <li class="{{ active_class('admin/coaches/create') }}">
                                 <a href="{{ route('coaches.create') }}"> {{ __('Add Coaches') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('coaches.index'))
                             <li class="{{ active_class('admin/coaches') }}">
                                 <a href="{{ route('coaches.index') }}"> {{ __('Show Coaches') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('role.menu'))
                 <li class="menu">
                     <a href="#roles" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/roles') }} {{ is_active_route('admin/permission') }} {{ is_active_route('admin/add/roles/permission') }}"
                         aria-controls="roles" class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Role & Permission') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/roles') }} {{ show_class('admin/permission') }} {{ show_class('admin/add/roles/permission') }}"
                         id="roles" data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('permission.index'))
                             <li class="">
                                 <a href="{{ route('permission.index') }}"
                                     class="nav-link {{ active_class('admin/permission') }}">{{ __('All Permission') }}</a>
                             </li>
                         @endif
                         @if (Auth::user()->can('role.index'))
                             <li class="">
                                 <a href="{{ route('roles.index') }}"
                                     class="nav-link {{ active_class('admin/roles') }}">
                                     {{ __('All Roles ') }}</a>
                             </li>
                         @endif
                         @if (Auth::user()->can('add.roles.permission'))
                             <li class="">
                                 <a href="{{ route('add.roles.permission') }}"
                                     class="nav-link {{ active_class('admin/add/roles/permission') }}">
                                     {{ __('Role in Permission') }}
                                 </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('all.roles.permission'))
                             <li class="">
                                 <a href="{{ route('all.roles.permission') }}"
                                     class="nav-link {{ active_class('admin/all/roles/permission') }}">All Role in

                                     {{ __('Permission') }}
                                 </a>
                             </li>
                         @endif


                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('admin.menu'))
                 <li class="menu">
                     <a href="#admin" data-bs-toggle="collapse"
                         aria-expanded="{{ is_active_route('admin/add/admin') }}" aria-controls="admin"
                         class="dropdown-toggle">
                         <div class="">
                             <i data-feather="menu"></i> <span>{{ __('Manage Users') }}</span>
                         </div>
                         <div>
                             <i data-feather="chevron-right"></i>
                         </div>
                     </a>
                     <ul class="collapse submenu list-unstyled {{ show_class('admin/add/admin') }}" id="admin"
                         data-bs-parent="#accordionExample">
                         @if (Auth::user()->can('add.admin'))
                             <li class="{{ active_class('admin/add/admin') }}">
                                 <a href="{{ route('add.admin') }}"> {{ __('Add User') }} </a>
                             </li>
                         @endif
                         @if (Auth::user()->can('all.admin'))
                             <li class="{{ active_class('admin/all/admin') }}">
                                 <a href="{{ route('all.admin') }}"> {{ __('Show Admin Users') }} </a>
                             </li>
                         @endif
                          @if (Auth::user()->can('all.users'))
                             <li class="{{ active_class('admin/users') }}">
                                 <a href="{{ route('all.users') }}"> {{ __('Show Users') }} </a>
                             </li>
                         @endif
                     </ul>
                 </li>
             @endif
             @if (Auth::user()->can('smtp.menu'))
                 <li class="menu">
                     @if (Auth::user()->can('smtp.setting'))
                         <a href="{{ route('smtp.setting') }}" aria-expanded="false" class="dropdown-toggle">
                             <div class="">
                                 <i data-feather="send"></i>
                                 <span>{{ __('SMTP Settings') }}</span>
                             </div>
                         </a>
                     @endif
                 </li>
             @endif
             @if (Auth::user()->can('site.menu'))
                 <li class="menu">
                     @if (Auth::user()->can('site.setting'))
                         <a href="{{ route('site.setting') }}" aria-expanded="false" class="dropdown-toggle">
                             <div class="">
                                 <i data-feather="settings"></i>
                                 <span>{{ __('Settings') }}</span>
                             </div>
                         </a>
                     @endif

                 </li>
             @endif

         </ul>

     </nav>

 </div>
