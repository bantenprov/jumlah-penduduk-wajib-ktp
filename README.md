# jumlah-penduduk-wajib-ktp

[![Join the chat at https://gitter.im/jumlah-penduduk-wajib-ktp/Lobby](https://badges.gitter.im/jumlah-penduduk-wajib-ktp/Lobby.svg)](https://gitter.im/jumlah-penduduk-wajib-ktp/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-wajib-ktp/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-wajib-ktp/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-wajib-ktp/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/jumlah-penduduk-wajib-ktp/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/jumlah-penduduk-wajib-ktp/v/stable)](https://packagist.org/packages/bantenprov/jumlah-penduduk-wajib-ktp)
[![Total Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-wajib-ktp/downloads)](https://packagist.org/packages/bantenprov/jumlah-penduduk-wajib-ktp)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/jumlah-penduduk-wajib-ktp/v/unstable)](https://packagist.org/packages/bantenprov/jumlah-penduduk-wajib-ktp)
[![License](https://poser.pugx.org/bantenprov/jumlah-penduduk-wajib-ktp/license)](https://packagist.org/packages/bantenprov/jumlah-penduduk-wajib-ktp)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-wajib-ktp/d/monthly)](https://packagist.org/packages/bantenprov/jumlah-penduduk-wajib-ktp)
[![Daily Downloads](https://poser.pugx.org/bantenprov/jumlah-penduduk-wajib-ktp/d/daily)](https://packagist.org/packages/bantenprov/jumlah-penduduk-wajib-ktp)

Jumlah penduduk berdasarkan wajib KTP per desa/kelurahan

### install via composer

- Development snapshot
```bash
$ composer require bantenprov/jumlah-penduduk-wajib-ktp:dev-master
```
- Latest release:


### download via github

~~~bash
$ git clone https://github.com/bantenprov/jumlah-penduduk-wajib-ktp.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    
    //....
    Bantenprov\JPWajibKTP\JPWajibKTPServiceProvider::class

```

#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/jumlah-penduduk-wajib-ktp',
    components: {
        main: resolve => require(['./components/views/bantenprov/jumlah-penduduk-wajib-ktp/DashboardJPWajibKTP.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
        title: "Jumlah Penduduk Wajib KTP"
    }
  }
  //== ...
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
        path: '/admin/dashboard/jumlah-penduduk-wajib-ktp',
        components: {
          main: resolve => require(['./components/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPAdmin.show.vue'], resolve),
          navbar: resolve => require(['./components/Navbar.vue'], resolve),
          sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
          title: "Jumlah Penduduk Wajib KTP"
        }
    },
 //== ...   
  ]
},

```

#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
    {
      name: 'Dashboard',
      link: '/dashboard',
      icon: 'fa fa-angle-double-right'
    },
    {
      name: 'Entity',
      link: '/dashboard/entity',
      icon: 'fa fa-angle-double-right'
    },
    //== ...
    {
      name: 'Jumlah Penduduk Wajib KTP',
      link: '/admin/dashboard/jumlah-penduduk-wajib-ktp',
      icon: 'fa fa-angle-right'
    }
  ]
},
{
  name: 'Admin',
  icon: 'fa fa-lock',
  childType: 'collapse',
  childItem: [
    {
      name: 'Dashboard',
      icon: 'fa fa-angle-double-right',
      child: [
        {
          name: 'Home',
          link: '/admin/dashboard/home',
          icon: 'fa fa-angle-right'
        },
        //== ...
        {
          name: 'Jumlah Penduduk Wajib KTP',
          link: '/admin/dashboard/jumlah-penduduk-wajib-ktp',
          icon: 'fa fa-angle-right'
        }
      ]
    },
  ]
}
```


#### Tambahkan components `resources/assets/js/components.js` :

```javascript

//== Jumlah Penduduk Berdasarkan Wajib KTP
import JPWajibKTP from './components/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTP.chart.vue';
Vue.component('echarts-jumlah-penduduk-wajib-ktp', JPWajibKTP);

import JPWajibKTPKota from './components/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPKota.chart.vue';
Vue.component('echarts-jumlah-penduduk-wajib-ktp-kota', JPWajibKTPKota);

import JPWajibKTPTahun from './components/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPTahun.chart.vue';
Vue.component('echarts-jumlah-penduduk-wajib-ktp-tahun', JPWajibKTPTahun);

//== Echarts Balita Gizi Buruk Mendapat Perawatan

import JPWajibKTPBar01 from './components/views/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPBar01.vue';
Vue.component('jumlah-penduduk-wajib-ktp-bar-01', JPWajibKTPBar01);

import JPWajibKTPBar02 from './components/views/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPBar02.vue';
Vue.component('jumlah-penduduk-wajib-ktp-bar-02', JPWajibKTPBar02);

//== mini bar charts
import JPWajibKTPBar03 from './components/views/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPBar03.vue';
Vue.component('jumlah-penduduk-wajib-ktp-bar-03', JPWajibKTPBar03);

import JPWajibKTPPie01 from './components/views/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPPie01.vue';
Vue.component('jumlah-penduduk-wajib-ktp-pie-01', JPWajibKTPPie01);

import JPWajibKTPPie02 from './components/views/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPPie02.vue';
Vue.component('jumlah-penduduk-wajib-ktp-pie-02', JPWajibKTPPie02);

//== mini pie charts
import JPWajibKTPPie03 from './components/views/bantenprov/jumlah-penduduk-wajib-ktp/JPWajibKTPPie03.vue';
Vue.component('jumlah-penduduk-wajib-ktp-pie-03', JPWajibKTPPie03);
```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=jumlah-penduduk-wajib-ktp-assets
$ php artisan vendor:publish --tag=jumlah-penduduk-wajib-ktp-public
```


