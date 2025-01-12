<aside class="border-2 border-red-300 p-2">
      {{-- <div class="sidebar-brand">
          <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
          <a href="{{ route('admin_dashboard') }}"></a>
      </div> --}}

      <ul>
        <li class="{{ Request::is('admin/dashboard/*') ? 'font-bold' : '' }} mb-2"><a class="" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

        <li class="{{ Request::is('admin/products/*') ? 'text-red-500' : '' }} mb-2">
          <a href="{{ route('admin_products') }}">
            <i class="fas fa-hand-point-right"></i> <span>Arts</span>
          </a>
        </li>

        <li class="{{ Request::is('admin/categories/*') ? 'text-red-500' : '' }}">
            <a href="{{ route('admin_categories') }}">
                <i class="fas fa-hand-point-right"></i> <span>Categories</span>
            </a>
        </li>
      </ul>

      {{-- <ul class="sidebar-menu">

          <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

          <li class="{{ Request::is('admin/slider/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin_slider_index') }}">
                  <i class="fas fa-hand-point-right"></i> <span>Slider</span>
              </a>
          </li>

          <li class="{{ Request::is('admin/welcome-item/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin_welcome_item_index') }}">
                  <i class="fas fa-hand-point-right"></i>
                  <span>Welcome Item</span>
              </a>
          </li>

          <li class="{{ Request::is('admin/feature/*') ? 'active' : '' }}">
              <a href="{{ route('admin_feature_index') }}" class="nav-link">
                  <i class="fas fa-hand-point-right"></i>
                  <span>Feature</span>
              </a>
          </li>

          <li class="{{ Request::is('admin/counter-item/*') ? 'active' : '' }}">
              <a href="{{ route('admin_counter_item_index') }}" class="nav-link">
                  <i class="fas fa-hand-point-right"></i>
                  <span>Counter Item</span>
              </a>
          </li>

          <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}">
              <a href="{{ route('admin_testimonial_index') }}" class="nav-link">
                  <i class="fas fa-hand-point-right"></i>
                  <span>Testimonial</span>
              </a>
          </li>

          <li class="{{ Request::is('admin/team-members/*') ? 'active' : '' }}">
              <a href="{{ route('admin_team_member_index') }}" class="nav-link">
                  <i class="fas fa-hand-point-right"></i>
                  <span>Team Members</span>
              </a>
          </li>

          <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}">
              <a href="{{ route('admin_faq_index') }}" class="nav-link">
                  <i class="fas fa-hand-point-right"></i>
                  <span>FAQ</span>
              </a>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin/blog-category/*') ? 'active' : '' }}">
              <a href="{{ route('admin_blog_category_index') }}" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Blog Section</span></a>
              <ul class="dropdown-menu">
                  <li class="{{ Route::is('admin/blog-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_blog_category_index') }}"><i class="fas fa-angle-right"></i> Category</a></li>
                  <li class="{{ Route::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_index') }}"><i class="fas fa-angle-right"></i> Post</a></li>
              </ul>
          </li>

          <li class="{{ Route::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_index') }}"><i class="fas fa-angle-right"></i> Post</a></li>

          <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>

      </ul> --}}
</aside>
