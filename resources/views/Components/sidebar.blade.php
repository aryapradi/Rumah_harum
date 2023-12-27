<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('Home') }}" class="app-brand-link" style="display: flex; align-items: center;">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo/logorh.png') }}" alt="Rumah Harum Logo" style="margin-left:-20px; margin-bottom:10px; max-width: 80px; height: auto; max-height: 100px;">
        </span>
        <span style="color: #79AC78; font-size:20px; margin-bottom:10px;">Rumah Harum</span>

    </a>
    
    
    

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

   

    <ul class="menu-inner py-1">

        <li class="menu-item {{ request()->routeIs('Home') ? 'active open' : '' }}">
            <a
              href="{{ route('Home') }}"
              
              class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Email">Dashboard</div>
            </a>
          </li>

          <li class="menu-item {{ request()->routeIs('Unit') ? 'active open' : '' }}">
            <a
              href="{{ route('Unit') }}"
              
              class="menu-link">
              <i class="menu-icon tf-icons bx bx-building-house"></i>
              <div data-i18n="Email">Unit</div>
            </a>
          </li>

          <li class="menu-item {{ request()->routeIs('Sampah') ? 'active open' : '' }}">
            <a
              href="{{ route('Sampah') }}"
              
              class="menu-link">
              <i class="menu-icon tf-icons bx bx-trash"></i>
              <div data-i18n="Email">Sampah</div>
            </a>
          </li>
      
      <!-- Forms & Tables -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Others</span></li>

      <!-- Tables -->
      <li class="menu-item {{ request()->routeIs('') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-plus"></i>
          <div data-i18n="Authentications">Tambahan</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('Satuan') }}" class="menu-link">
              <div data-i18n="Basic">Satuan</div>
            </a> 
          </li>
        </ul>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('Pengajuan') }}" class="menu-link">
              <div data-i18n="Basic">Pengajuan</div>
            </a>
          </li>
        </ul>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('Jenis') }}" class="menu-link">
              <div data-i18n="Basic">Jenis</div>
            </a>
          </li>
        </ul>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('Status') }}" class="menu-link">
              <div data-i18n="Basic">Status</div>
            </a>
          </li>
        </ul>
        
      </li>
      <!-- Misc -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
      <li class="menu-item">
        <a
          href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
          target="_blank"
          class="menu-link">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Documentation">Documentation</div>
        </a>
      </li>
    </ul>
  </aside>