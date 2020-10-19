<!DOCTYPE html>
<html lang="it-IT">
<head>
<!--
<link rel="manifest" href="manifest.json">

<script type="module">
  // This is the "Offline page" service worker

  importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.0.0/workbox-sw.js');

  const CACHE = "pwabuilder-page";

  // TODO: replace the following with the correct offline fallback page i.e.: const offlineFallbackPage = "offline.html";
  const offlineFallbackPage = "ToDo-replace-this-name.html";

  self.addEventListener("message", (event) => {
    if (event.data && event.data.type === "SKIP_WAITING") {
      self.skipWaiting();
    }
  });

  self.addEventListener('install', async (event) => {
    event.waitUntil(
      caches.open(CACHE)
        .then((cache) => cache.add(offlineFallbackPage))
    );
  });

  if (workbox.navigationPreload.isSupported()) {
    workbox.navigationPreload.enable();
  }

  self.addEventListener('fetch', (event) => {
    if (event.request.mode === 'navigate') {
      event.respondWith((async () => {
        try {
          const preloadResp = await event.preloadResponse;

          if (preloadResp) {
            return preloadResp;
          }

          const networkResp = await fetch(event.request);
          return networkResp;
        } catch (error) {

          const cache = await caches.open(CACHE);
          const cachedResp = await cache.match(offlineFallbackPage);
          return cachedResp;
        }
      })());
    }
  });

</script>-->
<!--
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="hmr">
<meta name="apple-mobile-web-app-title" content="hmr">
<meta name="msapplication-starturl" content="https://portfolio.setec.cloud:20009/ERP/HMR/">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="icon" href="images/hmrsmall.ico">
<link rel="apple-touch-icon" href="images/hmrsmall.ico">
-->
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>HMR - </title>
  <!-- loader-->
  
  <!--favicon-->
  <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
  <!-- Vector CSS -->
  <link href="plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <link href="css/jquery-ui.min.css" rel="stylesheet"/>
  <!--Data Tables -->
  <link href="plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <!-- animate CSS-->
  <link href="css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="css/app-style.css" rel="stylesheet"/>
  <!-- skins CSS-->
  <link href="css/skins.css" rel="stylesheet"/>
  <link href="plugins/fullcalendar/css/fullcalendar.css" rel="stylesheet">

  <link href="css/signature_pad.css" rel="stylesheet"/>
    <!-- jquery steps CSS-->
  <link rel="stylesheet" type="text/css" href="plugins/jquery.steps/css/jquery.steps.css">
  <!--Switchery-->
  <link href="plugins/switchery/css/switchery.min.css" rel="stylesheet" />
  <!--colorpicker -->
  <link href="plugins/colorselector/dist/bootstrap-colorselector.min.css" rel="stylesheet" />
  <link href="plugins/selectpicker/bootstrap-select.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="plugins/colorselector/css/docs.css" />
<script src="plugins/wacom/q.js" charset="UTF-8"></script>
    <script src="plugins/wacom/wgssStuSdk.js" charset="UTF-8"></script>

<link rel="stylesheet" type="text/css" href="plugins/wacom/demoButtons.css" />
  
  <script type="text/javascript" src="plugins/wacom/BigInt.js"></script>
  
  <script type="text/javascript" src="plugins/wacom/demoButtons_encryption.js"></script>
  <link href="plugins/yearpicker/yearpicker.css" rel="stylesheet" />
  

 
</head>

<body style="background-image: url(images/5.jpg);background-size:cover;background-attachment: fixed;">

