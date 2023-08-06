<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alliance</title>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css?_v=20230802212924" rel="stylesheet">
{{--    <link rel="stylesheet" href="css/style.min.css" />--}}
    <link rel="stylesheet" href="{{ Illuminate\Support\Facades\Vite::asset('resources/css/app.css') }}" />
</head>

<body>
<header class="header">
    <div class="header_container">
        <div class="flex items-center">
            <div class="header_logo" data-da="header_container,1,992">
                <a href="/" class="logo">
                    <img src="../img/logo.svg" alt="Logo">
                </a>
                <a href="/" class="logo-scroll">
                    <img src="../img/logo-scroll.svg" alt="Logo">
                </a>
            </div>
            <nav class="menu">
                <a href="tel:+78612054986" class="phone_menu">
                    <img src="../img/icons/phone.svg">
                </a>
                <div class="menu_body">
                    <ul class="menu_list">
                        <li class="menu_item">
                            <a class="menu_link" href="{{ route('main') }}">Главная</a>
                        </li>
                        <li class="menu_item">
                            <a class="menu_link" href="{{ route('catalog') }}">Каталог</a>
                        </li>
                        <li class="menu_item">
                            <a class="menu_link" href="{{ route('credit') }}">Кредит</a>
                        </li>
                        <li class="menu_item">
                            <a class="menu_link" href="{{ route('about') }}">О компании</a>
                        </li>
                        <li class="menu_item">
                            <a class="menu_link" href="{{ route('contacts') }}">Контакты</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_contact" data-da="menu_body,4,992" >
            <div class="phone_1 phone">
                <p class="phone_text">Ростовское шоссе, 7</p>
                <a href="tel:+786120054986" class="phone_number">
                    <img src="../img/icons/phone.svg">
                    +7 (861) 205-49-86
                    </span>
                </a>
            </div>
            <div class="phone_2 phone">
                <p class="phone_text">Ростовское шоссе, 17</p>
                <a href="tel:+786120054986" class="phone_number">
                    <img src="../img/icons/phone.svg">
                    +7 (861) 205-49-86
                    </span>
                </a>
            </div>
        </div>
        <div class="menu_icon">
            <span></span>
        </div>
    </div>
    <header class="header-filter">
        <div class="header_logo">
            <a href="/" class="logo filter-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="176" height="47" viewBox="0 0 112 31" fill="none">
                    <path d="M0.262071 29.781C0.0180739 29.6785 -0.0555459 29.5085 0.0412114 29.2708L3.12693 22.0609C3.21527 21.8601 3.36462 21.7597 3.57496 21.7597H3.60651C3.81264 21.7638 3.95568 21.8642 4.03561 22.0609L7.14025 29.2708C7.24543 29.5085 7.17391 29.6785 6.92571 29.781C6.68171 29.8752 6.50923 29.8056 6.40826 29.572L5.62579 27.7465H1.55567L0.779512 29.572C0.682755 29.8097 0.510274 29.8793 0.262071 29.781ZM1.8775 26.972H5.29135L3.57496 22.9829L1.8775 26.972Z" fill="#333333"/>
                    <path d="M9.19533 29.8178C8.9303 29.8178 8.79778 29.6888 8.79778 29.4306V22.1469C8.79778 21.8888 8.9303 21.7597 9.19533 21.7597C9.46036 21.7597 9.59288 21.8888 9.59288 22.1469V29.0434H13.3159C13.581 29.0434 13.7135 29.1725 13.7135 29.4306C13.7135 29.6888 13.581 29.8178 13.3159 29.8178H9.19533Z" fill="#333333"/>
                    <path d="M15.6781 29.8178C15.4131 29.8178 15.2806 29.6888 15.2806 29.4306V22.1469C15.2806 21.8888 15.4131 21.7597 15.6781 21.7597C15.9432 21.7597 16.0757 21.8888 16.0757 22.1469V29.0434H19.7987C20.0638 29.0434 20.1963 29.1725 20.1963 29.4306C20.1963 29.6888 20.0638 29.8178 19.7987 29.8178H15.6781Z" fill="#333333"/>
                    <path d="M22.1609 29.8178C22.0347 29.8178 21.9359 29.7851 21.8644 29.7195C21.797 29.6498 21.7634 29.5535 21.7634 29.4306V22.1469C21.7634 22.0199 21.797 21.9236 21.8644 21.858C21.9359 21.7925 22.0347 21.7597 22.1609 21.7597C22.2914 21.7597 22.3902 21.7925 22.4575 21.858C22.5248 21.9236 22.5585 22.0199 22.5585 22.1469V29.4306C22.5585 29.5535 22.5248 29.6498 22.4575 29.7195C22.3902 29.7851 22.2914 29.8178 22.1609 29.8178Z" fill="#333333"/>
                    <path d="M24.4432 29.781C24.1992 29.6785 24.1256 29.5085 24.2223 29.2708L27.308 22.0609C27.3964 21.8601 27.5457 21.7597 27.7561 21.7597H27.7876C27.9938 21.7638 28.1368 21.8642 28.2167 22.0609L31.3214 29.2708C31.4265 29.5085 31.355 29.6785 31.1068 29.781C30.8628 29.8752 30.6903 29.8056 30.5894 29.572L29.8069 27.7465H25.7368L24.9606 29.572C24.8639 29.8097 24.6914 29.8793 24.4432 29.781ZM26.0586 26.972H29.4725L27.7561 22.9829L26.0586 26.972Z" fill="#333333"/>
                    <path d="M33.3764 29.8178C33.1114 29.8178 32.9789 29.6888 32.9789 29.4306V22.1469C32.9789 21.8888 33.1114 21.7597 33.3764 21.7597C33.5153 21.7597 33.6499 21.8355 33.7803 21.9871L39.0367 28.5701H38.8474V22.1469C38.8474 21.8888 38.98 21.7597 39.245 21.7597C39.51 21.7597 39.6425 21.8888 39.6425 22.1469V29.4306C39.6425 29.6888 39.51 29.8178 39.245 29.8178C39.102 29.8178 38.9673 29.742 38.8411 29.5904L33.5847 23.0075H33.774V29.4306C33.774 29.6888 33.6415 29.8178 33.3764 29.8178Z" fill="#333333"/>
                    <path d="M44.5668 29.8178C43.6371 29.8178 42.9556 29.6068 42.5223 29.1848C42.089 28.7627 41.8723 28.0989 41.8723 27.1933V24.3843C41.8723 23.4705 42.089 22.8046 42.5223 22.3867C42.9556 21.9646 43.6329 21.7556 44.5542 21.7597H46.0813C46.8637 21.7597 47.4506 21.9175 47.8418 22.233C48.2331 22.5444 48.4518 23.0464 48.4981 23.7389C48.5149 23.8659 48.4897 23.9643 48.4224 24.0339C48.3551 24.1036 48.2541 24.1384 48.1195 24.1384C47.8755 24.1384 47.7367 24.0093 47.703 23.7512C47.6693 23.2841 47.5284 22.9644 47.2802 22.7923C47.0362 22.6202 46.6366 22.5342 46.0813 22.5342H44.5542C44.083 22.5301 43.7107 22.5854 43.4373 22.7001C43.1638 22.8149 42.9661 23.0075 42.8441 23.2779C42.7263 23.5484 42.6674 23.9171 42.6674 24.3843V27.1933C42.6674 27.6522 42.7263 28.0169 42.8441 28.2874C42.9661 28.5578 43.1659 28.7524 43.4436 28.8713C43.7212 28.986 44.0956 29.0434 44.5668 29.0434H46.0813C46.6366 29.0434 47.0362 28.9573 47.2802 28.7852C47.5284 28.609 47.6693 28.2894 47.703 27.8264C47.7367 27.5682 47.8755 27.4391 48.1195 27.4391C48.2541 27.4391 48.3551 27.474 48.4224 27.5436C48.4897 27.6092 48.5149 27.7075 48.4981 27.8387C48.4518 28.5271 48.2331 29.029 47.8418 29.3446C47.4506 29.6601 46.8637 29.8178 46.0813 29.8178H44.5668Z" fill="#333333"/>
                    <path d="M51.0131 29.8178C50.7481 29.8178 50.6156 29.6888 50.6156 29.4306V22.1469C50.6156 21.8888 50.7481 21.7597 51.0131 21.7597H55.6764C55.9414 21.7597 56.074 21.8888 56.074 22.1469C56.074 22.4051 55.9414 22.5342 55.6764 22.5342H51.4107V25.3554H54.1872C54.4522 25.3554 54.5847 25.4845 54.5847 25.7427C54.5847 26.0008 54.4522 26.1299 54.1872 26.1299H51.4107V29.0434H55.6764C55.9414 29.0434 56.074 29.1725 56.074 29.4306C56.074 29.6888 55.9414 29.8178 55.6764 29.8178H51.0131Z" fill="#333333"/>
                    <path d="M64.2154 29.9188C63.9503 29.9188 63.8178 29.7897 63.8178 29.5315V22.2479C63.8178 21.9897 63.9503 21.8606 64.2154 21.8606C64.4005 21.8606 64.5498 21.9446 64.6634 22.1126L67.7491 26.6857L67.5724 26.7103L70.6708 22.1126C70.7801 21.9446 70.94 21.8606 71.1503 21.8606C71.3775 21.8606 71.4911 21.9897 71.4911 22.2479V29.5315C71.4911 29.7897 71.3586 29.9188 71.0936 29.9188C70.8285 29.9188 70.696 29.7897 70.696 29.5315V23.0223L70.9358 23.1022L68.1088 27.2512C67.9952 27.4192 67.8354 27.5032 67.6292 27.5032C67.4651 27.5032 67.3263 27.4192 67.2127 27.2512L64.3857 23.1022L64.6129 23.176V29.5315C64.6129 29.7897 64.4804 29.9188 64.2154 29.9188Z" fill="#333333"/>
                    <path d="M76.4164 29.9188C75.4866 29.9188 74.8051 29.7077 74.3718 29.2857C73.9385 28.8636 73.7219 28.1998 73.7219 27.2942V24.4791C73.7219 23.5653 73.9385 22.8994 74.3718 22.4814C74.8093 22.0594 75.4887 21.8524 76.41 21.8606H77.9308C78.8647 21.8606 79.5462 22.0716 79.9753 22.4937C80.4086 22.9117 80.6253 23.5755 80.6253 24.4852V27.2942C80.6253 28.1998 80.4086 28.8636 79.9753 29.2857C79.5462 29.7077 78.8647 29.9188 77.9308 29.9188H76.4164ZM76.4164 29.1443H77.9308C78.4062 29.1443 78.7806 29.0869 79.054 28.9722C79.3317 28.8534 79.5294 28.6587 79.6472 28.3883C79.7692 28.1178 79.8302 27.7531 79.8302 27.2942V24.4852C79.8302 24.0263 79.7692 23.6616 79.6472 23.3911C79.5294 23.1207 79.3317 22.9281 79.054 22.8133C78.7806 22.6945 78.4062 22.6351 77.9308 22.6351H76.41C75.9389 22.631 75.5645 22.6863 75.2868 22.801C75.0134 22.9158 74.8157 23.1084 74.6936 23.3788C74.5759 23.6493 74.517 24.016 74.517 24.4791V27.2942C74.517 27.7531 74.5759 28.1178 74.6936 28.3883C74.8157 28.6587 75.0155 28.8534 75.2931 28.9722C75.5708 29.0869 75.9452 29.1443 76.4164 29.1443Z" fill="#333333"/>
                    <path d="M84.8089 29.9249C84.6827 29.9249 84.5838 29.8921 84.5123 29.8266C84.445 29.7569 84.4114 29.6606 84.4114 29.5377V22.6351H81.8052C81.679 22.6351 81.5801 22.6023 81.5086 22.5367C81.4413 22.4671 81.4077 22.3708 81.4077 22.2479C81.4077 22.1249 81.4413 22.0307 81.5086 21.9651C81.5801 21.8954 81.679 21.8606 81.8052 21.8606H87.8126C87.9388 21.8606 88.0355 21.8954 88.1029 21.9651C88.1744 22.0307 88.2101 22.1249 88.2101 22.2479C88.2101 22.3708 88.1744 22.4671 88.1029 22.5367C88.0355 22.6023 87.9388 22.6351 87.8126 22.6351H85.2064V29.5377C85.2064 29.6565 85.1707 29.7508 85.0992 29.8204C85.0319 29.8901 84.9351 29.9249 84.8089 29.9249Z" fill="#333333"/>
                    <path d="M91.6867 29.9188C90.757 29.9188 90.0755 29.7077 89.6422 29.2857C89.2089 28.8636 88.9922 28.1998 88.9922 27.2942V24.4791C88.9922 23.5653 89.2089 22.8994 89.6422 22.4814C90.0797 22.0594 90.7591 21.8524 91.6804 21.8606H93.2011C94.1351 21.8606 94.8166 22.0716 95.2457 22.4937C95.679 22.9117 95.8956 23.5755 95.8956 24.4852V27.2942C95.8956 28.1998 95.679 28.8636 95.2457 29.2857C94.8166 29.7077 94.1351 29.9188 93.2011 29.9188H91.6867ZM91.6867 29.1443H93.2011C93.6765 29.1443 94.0509 29.0869 94.3244 28.9722C94.602 28.8534 94.7998 28.6587 94.9175 28.3883C95.0395 28.1178 95.1005 27.7531 95.1005 27.2942V24.4852C95.1005 24.0263 95.0395 23.6616 94.9175 23.3911C94.7998 23.1207 94.602 22.9281 94.3244 22.8133C94.0509 22.6945 93.6765 22.6351 93.2011 22.6351H91.6804C91.2092 22.631 90.8348 22.6863 90.5572 22.801C90.2837 22.9158 90.086 23.1084 89.964 23.3788C89.8462 23.6493 89.7873 24.016 89.7873 24.4791V27.2942C89.7873 27.7531 89.8462 28.1178 89.964 28.3883C90.086 28.6587 90.2858 28.8534 90.5635 28.9722C90.8411 29.0869 91.2155 29.1443 91.6867 29.1443Z" fill="#333333"/>
                    <path d="M103.632 29.9372C103.527 29.9987 103.426 30.0171 103.33 29.9925C103.237 29.972 103.157 29.9126 103.09 29.8143L101.058 26.6181H98.925V29.5315C98.925 29.7897 98.7924 29.9188 98.5274 29.9188C98.2624 29.9188 98.1299 29.7897 98.1299 29.5315V22.2479C98.1299 21.9897 98.2624 21.8606 98.5274 21.8606H101.481C102.217 21.8606 102.776 22.0471 103.159 22.42C103.542 22.7928 103.733 23.3378 103.733 24.0549V24.4237C103.733 25.0507 103.584 25.5465 103.285 25.9112C102.991 26.2759 102.555 26.4992 101.979 26.5812L103.771 29.4086C103.902 29.6258 103.855 29.802 103.632 29.9372ZM98.925 25.8436H101.481C101.998 25.8436 102.37 25.733 102.598 25.5117C102.825 25.2863 102.938 24.9237 102.938 24.4237V24.0549C102.938 23.555 102.825 23.1944 102.598 22.9731C102.37 22.7478 101.998 22.6351 101.481 22.6351H98.925V25.8436Z" fill="#333333"/>
                    <path d="M107.854 29.9126C107.114 29.9126 106.554 29.7569 106.176 29.4455C105.801 29.1341 105.589 28.6464 105.538 27.9826C105.53 27.8556 105.561 27.7572 105.633 27.6876C105.704 27.6179 105.803 27.5831 105.93 27.5831C106.056 27.5831 106.15 27.6158 106.214 27.6814C106.281 27.747 106.323 27.8412 106.34 27.9642C106.369 28.4026 106.497 28.7079 106.725 28.88C106.952 29.0521 107.328 29.1382 107.854 29.1382H109.672C110.252 29.1382 110.652 29.0316 110.87 28.8185C111.093 28.6013 111.205 28.2141 111.205 27.6568C111.205 27.0913 111.091 26.7021 110.864 26.489C110.641 26.2718 110.244 26.1632 109.672 26.1632H107.999C107.238 26.1632 106.678 25.9891 106.321 25.6408C105.963 25.2884 105.784 24.7434 105.784 24.0058C105.784 23.2682 105.961 22.7273 106.314 22.3831C106.672 22.0348 107.229 21.8606 107.987 21.8606H109.665C110.359 21.8606 110.883 22.0081 111.236 22.3032C111.594 22.5941 111.798 23.051 111.849 23.6739C111.861 23.7968 111.832 23.8951 111.76 23.9689C111.689 24.0386 111.588 24.0734 111.457 24.0734C111.335 24.0734 111.241 24.0406 111.173 23.975C111.106 23.9054 111.066 23.8111 111.053 23.6923C111.02 23.2948 110.898 23.0203 110.687 22.8687C110.477 22.7129 110.136 22.6351 109.665 22.6351H107.987C107.448 22.6351 107.078 22.7355 106.876 22.9363C106.678 23.133 106.579 23.4895 106.579 24.0058C106.579 24.5221 106.68 24.8827 106.882 25.0876C107.089 25.2884 107.461 25.3887 107.999 25.3887H109.672C110.467 25.3887 111.053 25.5731 111.432 25.9419C111.811 26.3066 112 26.8783 112 27.6568C112 28.4313 111.811 29.0009 111.432 29.3656C111.058 29.7303 110.471 29.9126 109.672 29.9126H107.854Z" fill="#333333"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M48.0707 16.5226L50.592 15.8627C50.6786 15.8401 50.7506 15.7799 50.7883 15.6986L52.7572 11.4477C52.8424 11.2638 53.0816 11.2156 53.2315 11.3521L55.8074 13.6995C55.9219 13.8038 56.0971 13.8038 56.2116 13.6995L58.7991 11.3415C58.9455 11.2082 59.1786 11.2507 59.2685 11.4271L61.4505 15.7098C61.4886 15.7845 61.5561 15.8398 61.6368 15.8624L63.9362 16.5072C64.1872 16.5775 64.4023 16.3163 64.2852 16.0835L56.2775 0.165183C56.1667 -0.0550604 55.8523 -0.0550615 55.7415 0.165182L47.7268 16.0975C47.6107 16.3282 47.8209 16.5879 48.0707 16.5226ZM55.6123 5.76519L54.0938 8.78195C54.0149 8.93854 54.0473 9.1282 54.1735 9.24984L55.7598 10.7784C55.9206 10.9333 56.177 10.9266 56.3295 10.7636L57.7481 9.24691C57.8616 9.12554 57.8883 8.94662 57.8151 8.79743L56.3286 5.7688C56.183 5.47211 55.7608 5.46999 55.6123 5.76519Z" fill="#333333"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M59.1941 3.63247L62.5517 0.337467C62.5891 0.300771 62.6394 0.280212 62.6918 0.280212H78.6984C78.8773 0.280212 78.9662 0.497188 78.8387 0.622726L77.052 2.38199C77.0145 2.41883 76.9641 2.43948 76.9116 2.43948H63.6644C63.6122 2.43948 63.5621 2.45987 63.5247 2.4963L60.3316 5.61046C60.235 5.70472 60.0746 5.67812 60.0136 5.55772L59.1558 3.86565C59.1164 3.78789 59.1318 3.69354 59.1941 3.63247ZM63.8925 3.25143L60.5986 6.48534C60.5372 6.54567 60.5213 6.63856 60.5591 6.71592L61.4855 8.61042C61.5156 8.67195 61.5973 8.6857 61.6459 8.63742L66.4358 3.87789C66.689 3.62627 66.5108 3.19414 66.1539 3.19414H64.0326C63.9802 3.19414 63.9299 3.21471 63.8925 3.25143ZM66.4107 5.03958L68.1754 3.30858C68.2502 3.23523 68.3508 3.19414 68.4555 3.19414H75.7449C75.9243 3.19414 76.013 3.4122 75.8844 3.53741L74.0881 5.28708C74.0499 5.32432 73.9984 5.34473 73.945 5.34378L66.4789 5.21095C66.3903 5.20937 66.3474 5.10169 66.4107 5.03958ZM65.184 6.24694L63.6623 7.77806C63.5369 7.90423 63.6263 8.11904 63.8042 8.11904H71.0793C71.131 8.11904 71.1806 8.09906 71.2179 8.06328L72.8973 6.45003C73.0274 6.32503 72.9386 6.10522 72.7581 6.10579L65.4664 6.1289C65.3603 6.12924 65.2587 6.1717 65.184 6.24694Z" fill="#B40D16"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M52.8059 3.63247L49.4483 0.337467C49.4109 0.300771 49.3606 0.280212 49.3082 0.280212H33.3016C33.1227 0.280212 33.0338 0.497188 33.1613 0.622726L34.948 2.38199C34.9855 2.41883 35.0359 2.43948 35.0884 2.43948H48.3356C48.3878 2.43948 48.4379 2.45987 48.4753 2.4963L51.6684 5.61046C51.765 5.70472 51.9254 5.67812 51.9864 5.55772L52.8442 3.86565C52.8836 3.78789 52.8682 3.69354 52.8059 3.63247ZM48.1075 3.25143L51.4014 6.48534C51.4628 6.54567 51.4787 6.63856 51.4409 6.71592L50.5145 8.61042C50.4844 8.67195 50.4027 8.6857 50.3541 8.63742L45.5642 3.87789C45.311 3.62627 45.4892 3.19414 45.8461 3.19414H47.9674C48.0198 3.19414 48.0701 3.21471 48.1075 3.25143ZM45.5893 5.03958L43.8246 3.30858C43.7498 3.23523 43.6492 3.19414 43.5445 3.19414H36.2551C36.0757 3.19414 35.987 3.4122 36.1156 3.53741L37.9119 5.28708C37.9501 5.32432 38.0016 5.34473 38.055 5.34378L45.5211 5.21095C45.6097 5.20937 45.6526 5.10169 45.5893 5.03958ZM46.816 6.24694L48.3377 7.77806C48.4631 7.90423 48.3737 8.11904 48.1958 8.11904H40.9207C40.869 8.11904 40.8194 8.09906 40.7821 8.06328L39.1027 6.45003C38.9726 6.32503 39.0614 6.10522 39.2419 6.10579L46.5336 6.1289C46.6397 6.12924 46.7413 6.1717 46.816 6.24694Z" fill="#B40D16"/>
                </svg>
            </a>
        </div>
        <svg width="40" height="40" class="filter-close" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 10L10 30" stroke="#E7E7E7" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 10L30 30" stroke="#E7E7E7" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </header>
</header>
@yield('content')
<footer class="footer">
    <div class="footer_container">
        <div class="flex map">
            <div class="footer_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2817.8275633262365!2d38.98310637556051!3d45.06900895972072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40f04596973e77e7%3A0x1d9da4a217e535b8!2z0YPQuy4g0KDQvtGB0YLQvtCy0YHQutC-0LUg0YguLCA3LCDQmtGA0LDRgdC90L7QtNCw0YAsINCa0YDQsNGB0L3QvtC00LDRgNGB0LrQuNC5INC60YDQsNC5LCDQoNC-0YHRgdC40Y8sIDM1MDA1MQ!5e0!3m2!1sru!2s!4v1687773364655!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="footer_contact">
                <h1 class="footer_title">Контакты</h1>
                <ul>
                    <li>
                        <img src="../img/icons/geo.svg" alt="Geo">
                        <p>Краснодар, ул. Ростовское шоссе, 7 <br><a href="tel:+89180259393">8 (918) 025-93-93</a></p>
                    </li>
                    <li>
                        <img src="../img/icons/geo.svg" alt="Geo">
                        <p>Краснодар, ул. Ростовское шоссе, 7 <br><a href="tel:+89180259393">8 (918) 025-93-93</a></p>
                    </li>
                    <li>
                        <img src="../img/icons/mail.svg" alt="Mail">
                        <p><a href="mailto:alliance.motors@bk.ru" class="m-0">alliance.motors@bk.ru</a></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-navbar">
            <div class="footer_menubar">
                <a href="/" class="footer_logo">
                    <img src="../img/logo.svg" alt="Logo">
                </a>
                <nav class="footer-menu">
                    <div class="footer-menu_body">
                        <ul class="footer-menu_list">
                            <li class="footer-menu_item">
                                <a class="footer-menu_link" href="{{ route('main') }}">Главная</a>
                            </li>
                            <li class="footer-menu_item">
                                <a class="footer-menu_link" href="{{ route('catalog') }}">Каталог</a>
                            </li>
                            <li class="footer-menu_item">
                                <a class="footer-menu_link" href="{{ route('credit') }}">Кредит</a>
                            </li>
                            <li class="footer-menu_item">
                                <a class="footer-menu_link" href="{{ route('about') }}">О компании</a>
                            </li>
                            <li class="footer-menu_item">
                                <a class="footer-menu_link" href="{{ route('contacts') }}">Контакты</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="footer-contact">
                <div class="footer-phone_1 footer-phone">
                    <p class="footer-phone_text">Ростовское шоссе, 7</p>
                    <a href="tel:+786120054986" class="footer-phone_number">
                        <img src="../img/icons/phone.svg">+7 (861) 205-49-86</span>
                    </a>
                </div>
                <div class="footer-phone_2 footer-phone">
                    <p class="footer-phone_text">Ростовское шоссе, 17</p>
                    <a href="tel:+786120054986" class="footer-phone_number">
                        <img src="../img/icons/phone.svg">+7 (861) 205-49-86</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="politicy">
            <div class="politicy_title">
                <div>ООО "Alliance Motors" © 2023</div>
                <div>Политика конфиденциальности</div>
            </div>
            <p class="politicy_text">Обращаем Ваше внимание на то, что данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положением ч. 2 ст. 437 Гражданского кодекса Российской Федерации. Для получения подробной информации о стоимости автомобилей, пожалуйста, обращайтесь к менеджеру по продажам. Предоставляя свои персональные данные и используя настоящий веб-сайт, Вы соглашаетесь с обработкой Ваших персональных данных и принимаете условия их обработки. <a href="{{ route('privacy') }}">Политика конфиденциальности.</a></p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js?_v=20230802212924"></script>
{{--<script src="js/splide.min.js"></script>--}}
{{--<script src="js/app.min.js"></script>--}}
<script src="{{ Illuminate\Support\Facades\Vite::asset('resources/js/app.js') }}"></script>
</body>
</html>
