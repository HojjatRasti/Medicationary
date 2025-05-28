<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin.Med</title>
    {{-- fav icon --}}
    <link rel="icon" type="image/x-icon" href="/images/medLogo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="/js/admi-script.js" type="module"></script>
    {{-- add quill the text editor --}}
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/sahel-font@v3.4.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    <link href="/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
    {{-- add multi selection drop down --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>

<body class="admin-main">
    <!-- header -->
    <header class="admin-status col-7 float-end">

        <!-- user info and log out btn -->
        <div id="admin-user-status" class="me-4 mt-3
         float-end">
            <div class="btn-group w-auto" role="group" aria-label="Basic example">
                <!-- logout btn -->

                <!-- user name -->
                <button type="button" class="btn btn-success col-9 w-auto">{{$currentUser->name}}</button>

                <a href="{{ route('admin.logout') }}">
                    <button type="button" class="btn btn-outline-danger col-2 w-auto rounded-start-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 26 26">
                            <path fill="currentColor"
                                d="M13 0a2 2 0 0 0-2 2v10a2 2 0 0 0 4 0V2a2 2 0 0 0-2-2zM5.844 2.594a1.5 1.5 0 0 0-.782.344A12.796 12.796 0 0 0 .188 13C.188 20.058 5.94 25.813 13 25.813S25.813 20.058 25.813 13c0-4.073-1.902-7.717-4.875-10.063a1.5 1.5 0 1 0-1.875 2.344A9.804 9.804 0 0 1 22.813 13A9.789 9.789 0 0 1 13 22.813A9.789 9.789 0 0 1 3.187 13a9.808 9.808 0 0 1 3.75-7.719a1.5 1.5 0 0 0-1.093-2.687z" />
                        </svg>
                    </button>
                    </a>
            </div>
        </div>
    </header>
