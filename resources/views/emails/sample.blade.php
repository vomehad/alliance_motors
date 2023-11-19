<!DOCTYPE html>
<html>
<head>
    <title></title>

    <!--
	You can put your custom CSS if you wish
    -->
    <style>
        .table_1 {
            background: #FFFFFF;
            min-width: 360px;
            font-size: 1px;
            line-height: normal;
        }
        .table800 {
            width: 100%;
            max-width: 800px;
            min-width: 360px;
        }
    </style>
</head>
<body>
{{--<p>{{ $content['body'] }}</p>--}}
{{--{{$content}}--}}
<p>Новая заявка на кредит
    от ФИО {{ $content['fio'] }}
    Номер телефона {{ $content['number'] }}
    Марка Модель автомобиля {{ $content['brand'] }} {{ $content['model'] }}
    Цена {{ $content['price'] }}
    VIN {{ $content['vin'] }}
    Сылка на автомобиль с  сайта {{ $content['link'] }}
</p>
<table
    cellpadding="0"
    cellspacing="0"
    border="0"
    width="100%"
    class="table_1"
>
    <tbody>
    <tr>
        <td align="center" valign="top">
            <table
                cellpadding="0"
                cellspacing="0"
                border="0"
                width="800"
                class="table800"
            >
                <!-- шапка - начало -->
                <tbody>
                <tr>
                    <td align="center" valign="top" style="background: #FFFFFF;">
                        <div style="height: 40px; line-height: 40px; font-size: 8px;">&nbsp;</div>
                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 620px;">
                            <tbody>
                            <tr>
                                <td width="10" style="width: 10px;">&nbsp;</td>
                                <td align="left" width="250">
                                    <svg width="176" height="47" viewBox="0 0 176 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M75.6286 25.8356L79.8619 24.7067C79.9487 24.6836 80.0206 24.6228 80.0578 24.541L83.1665 17.7017C83.2513 17.5153 83.4937 17.4667 83.6438 17.606L87.8102 21.4749C87.9253 21.5818 88.1034 21.5818 88.2185 21.4749L92.3966 17.5952C92.5432 17.4591 92.7795 17.5019 92.869 17.6809L96.3046 24.5521C96.3423 24.6273 96.4097 24.6833 96.4906 24.7064L100.388 25.82C100.638 25.8915 100.855 25.6321 100.739 25.3987L88.2834 0.1672C88.1733 -0.0557333 87.8554 -0.0557332 87.7454 0.1672L75.2823 25.413C75.1681 25.6441 75.3795 25.9021 75.6286 25.8356ZM87.5976 8.73126L85.0338 13.9214C84.9573 14.0764 84.9889 14.2629 85.1122 14.384L87.7842 17.0075C87.9456 17.166 88.2061 17.1592 88.3591 16.9926L90.7564 14.3809C90.8671 14.2603 90.8932 14.0843 90.8221 13.9368L88.3166 8.73484C88.172 8.43461 87.7452 8.43248 87.5976 8.73126Z" fill="#333333"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M92.7913 5.86604L97.9745 0.682785C98.012 0.645278 98.0629 0.624207 98.1159 0.624207H122.712C122.89 0.624207 122.98 0.839305 122.854 0.965394L119.924 3.90511C119.886 3.94276 119.835 3.96392 119.782 3.96392H99.5924C99.5396 3.96392 99.4889 3.98482 99.4514 4.02206L94.4755 8.9671C94.3788 9.06326 94.2163 9.03646 94.1555 8.91433L92.7536 6.09655C92.7153 6.0196 92.7305 5.92681 92.7913 5.86604ZM100.01 5.1898L94.924 10.2777C94.864 10.3377 94.8484 10.4291 94.8851 10.5056L96.3578 13.5743C96.3878 13.6367 96.4705 13.6506 96.5191 13.6013L104.212 5.81227C104.461 5.55957 104.282 5.13119 103.927 5.13119H100.151C100.098 5.13119 100.047 5.15228 100.01 5.1898ZM103.71 8.07756L106.54 5.24828C106.615 5.17331 106.717 5.13119 106.823 5.13119H118.231C118.41 5.13119 118.499 5.34737 118.372 5.47314L115.424 8.39876C115.386 8.43683 115.334 8.45776 115.28 8.45678L103.779 8.24827C103.69 8.24667 103.647 8.13993 103.71 8.07756ZM102 9.79134L99.4471 12.4088C99.3235 12.5355 99.4133 12.7485 99.5903 12.7485H110.929C110.981 12.7485 111.031 12.728 111.069 12.6914L113.842 9.97668C113.97 9.8511 113.881 9.63317 113.702 9.63375L102.285 9.67063C102.178 9.67097 102.075 9.71447 102 9.79134Z" fill="#B40D16"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M83.2087 5.86604L78.0255 0.682785C77.988 0.645278 77.9371 0.624207 77.8841 0.624207H53.2878C53.1097 0.624207 53.0204 0.839305 53.1461 0.965394L56.0761 3.90511C56.1136 3.94276 56.1646 3.96392 56.2178 3.96392H76.4076C76.4604 3.96392 76.5111 3.98482 76.5486 4.02206L81.5245 8.9671C81.6212 9.06326 81.7837 9.03646 81.8445 8.91433L83.2464 6.09655C83.2847 6.0196 83.2695 5.92681 83.2087 5.86604ZM75.9904 5.1898L81.076 10.2777C81.136 10.3377 81.1516 10.4291 81.1149 10.5056L79.6422 13.5743C79.6122 13.6367 79.5295 13.6506 79.4809 13.6013L71.7882 5.81227C71.5386 5.55957 71.7176 5.13119 72.0728 5.13119H75.8489C75.902 5.13119 75.9529 5.15228 75.9904 5.1898ZM72.2902 8.07756L69.4596 5.24828C69.3845 5.17331 69.2828 5.13119 69.1768 5.13119H57.7688C57.5903 5.13119 57.5012 5.34737 57.628 5.47314L60.5755 8.39876C60.6139 8.43683 60.666 8.45776 60.72 8.45678L72.2213 8.24827C72.3095 8.24667 72.3526 8.13993 72.2902 8.07756ZM74 9.79134L76.5529 12.4088C76.6765 12.5355 76.5867 12.7485 76.4097 12.7485H65.0712C65.0189 12.7485 64.9687 12.728 64.9313 12.6914L62.1579 9.97668C62.0296 9.8511 62.1189 9.63317 62.2984 9.63375L73.715 9.67063C73.8224 9.67097 73.9251 9.71447 74 9.79134Z" fill="#B40D16"/>
                                        <path d="M3.39779 46.2528C3.02743 46.0943 2.91569 45.8313 3.06255 45.4637L7.74623 34.3122C7.88032 34.0016 8.10701 33.8463 8.42628 33.8463H8.47417C8.78705 33.8527 9.00415 34.008 9.12547 34.3122L13.8379 45.4637C13.9975 45.8313 13.889 46.0943 13.5122 46.2528C13.1419 46.3985 12.8801 46.2908 12.7268 45.9295L11.5391 43.106H5.36129L4.18319 45.9295C4.03632 46.2971 3.77452 46.4049 3.39779 46.2528ZM5.84977 41.9081H11.0315L8.42628 35.7382L5.84977 41.9081Z" fill="#333333"/>
                                        <path d="M16.9572 46.3098C16.5549 46.3098 16.3538 46.1101 16.3538 45.7109V34.4453C16.3538 34.046 16.5549 33.8463 16.9572 33.8463C17.3595 33.8463 17.5606 34.046 17.5606 34.4453V45.1119H23.2117C23.614 45.1119 23.8151 45.3116 23.8151 45.7109C23.8151 46.1101 23.614 46.3098 23.2117 46.3098H16.9572Z" fill="#333333"/>
                                        <path d="M26.7972 46.3098C26.3949 46.3098 26.1938 46.1101 26.1938 45.7109V34.4453C26.1938 34.046 26.3949 33.8463 26.7972 33.8463C27.1994 33.8463 27.4006 34.046 27.4006 34.4453V45.1119H33.0516C33.4539 45.1119 33.6551 45.3116 33.6551 45.7109C33.6551 46.1101 33.4539 46.3098 33.0516 46.3098H26.7972Z" fill="#333333"/>
                                        <path d="M36.6371 46.3098C36.4456 46.3098 36.2955 46.2591 36.187 46.1577C36.0848 46.0499 36.0337 45.901 36.0337 45.7109V34.4453C36.0337 34.2488 36.0848 34.0999 36.187 33.9985C36.2955 33.897 36.4456 33.8463 36.6371 33.8463C36.8351 33.8463 36.9851 33.897 37.0873 33.9985C37.1895 34.0999 37.2406 34.2488 37.2406 34.4453V45.7109C37.2406 45.901 37.1895 46.0499 37.0873 46.1577C36.9851 46.2591 36.8351 46.3098 36.6371 46.3098Z" fill="#333333"/>
                                        <path d="M40.1013 46.2528C39.7309 46.0943 39.6192 45.8313 39.766 45.4637L44.4497 34.3122C44.5838 34.0016 44.8105 33.8463 45.1298 33.8463H45.1776C45.4905 33.8527 45.7076 34.008 45.829 34.3122L50.5414 45.4637C50.701 45.8313 50.5924 46.0943 50.2157 46.2528C49.8454 46.3985 49.5836 46.2908 49.4303 45.9295L48.2426 43.106H42.0648L40.8867 45.9295C40.7398 46.2971 40.478 46.4049 40.1013 46.2528ZM42.5532 41.9081H47.735L45.1298 35.7382L42.5532 41.9081Z" fill="#333333"/>
                                        <path d="M53.6607 46.3098C53.2584 46.3098 53.0573 46.1101 53.0573 45.7109V34.4453C53.0573 34.046 53.2584 33.8463 53.6607 33.8463C53.8714 33.8463 54.0757 33.9636 54.2737 34.1981L62.2522 44.3799H61.9649V34.4453C61.9649 34.046 62.166 33.8463 62.5683 33.8463C62.9706 33.8463 63.1717 34.046 63.1717 34.4453V45.7109C63.1717 46.1101 62.9706 46.3098 62.5683 46.3098C62.3512 46.3098 62.1468 46.1925 61.9553 45.958L53.9767 35.7762H54.2641V45.7109C54.2641 46.1101 54.063 46.3098 53.6607 46.3098Z" fill="#333333"/>
                                        <path d="M70.646 46.3098C69.2349 46.3098 68.2004 45.9834 67.5427 45.3306C66.885 44.6778 66.5562 43.6511 66.5562 42.2504V37.9058C66.5562 36.4924 66.885 35.4625 67.5427 34.816C68.2004 34.1632 69.2285 33.84 70.6269 33.8463H72.9448C74.1325 33.8463 75.0232 34.0904 75.6171 34.5784C76.2109 35.06 76.5429 35.8364 76.6132 36.9075C76.6387 37.104 76.6004 37.2561 76.4982 37.3639C76.3961 37.4716 76.2428 37.5255 76.0385 37.5255C75.6681 37.5255 75.4574 37.3258 75.4063 36.9266C75.3553 36.204 75.1413 35.7097 74.7646 35.4435C74.3943 35.1773 73.7877 35.0442 72.9448 35.0442H70.6269C69.9117 35.0379 69.3466 35.1234 68.9316 35.3009C68.5165 35.4783 68.2164 35.7762 68.0312 36.1945C67.8524 36.6128 67.763 37.1832 67.763 37.9058V42.2504C67.763 42.9602 67.8524 43.5243 68.0312 43.9426C68.2164 44.3609 68.5197 44.6619 68.9411 44.8457C69.3626 45.0232 69.9309 45.1119 70.646 45.1119H72.9448C73.7877 45.1119 74.3943 44.9788 74.7646 44.7127C75.1413 44.4401 75.3553 43.9458 75.4063 43.2296C75.4574 42.8303 75.6681 42.6307 76.0385 42.6307C76.2428 42.6307 76.3961 42.6845 76.4982 42.7923C76.6004 42.8937 76.6387 43.0458 76.6132 43.2486C76.5429 44.3134 76.2109 45.0898 75.6171 45.5778C75.0232 46.0658 74.1325 46.3098 72.9448 46.3098H70.646Z" fill="#333333"/>
                                        <path d="M80.4306 46.3098C80.0284 46.3098 79.8272 46.1101 79.8272 45.7109V34.4453C79.8272 34.046 80.0284 33.8463 80.4306 33.8463H87.5088C87.9111 33.8463 88.1123 34.046 88.1123 34.4453C88.1123 34.8446 87.9111 35.0442 87.5088 35.0442H81.0341V39.4078H85.2484C85.6507 39.4078 85.8518 39.6075 85.8518 40.0068C85.8518 40.4061 85.6507 40.6057 85.2484 40.6057H81.0341V45.1119H87.5088C87.9111 45.1119 88.1123 45.3116 88.1123 45.7109C88.1123 46.1101 87.9111 46.3098 87.5088 46.3098H80.4306Z" fill="#333333"/>
                                        <path d="M100.47 46.4659C100.067 46.4659 99.8663 46.2662 99.8663 45.867V34.6014C99.8663 34.2021 100.067 34.0024 100.47 34.0024C100.751 34.0024 100.977 34.1324 101.15 34.3922L105.833 41.4653L105.565 41.5033L110.268 34.3922C110.434 34.1324 110.677 34.0024 110.996 34.0024C111.341 34.0024 111.513 34.2021 111.513 34.6014V45.867C111.513 46.2662 111.312 46.4659 110.91 46.4659C110.508 46.4659 110.306 46.2662 110.306 45.867V35.7992L110.67 35.9228L106.379 42.3399C106.207 42.5998 105.964 42.7297 105.651 42.7297C105.402 42.7297 105.192 42.5998 105.019 42.3399L100.728 35.9228L101.073 36.0369V45.867C101.073 46.2662 100.872 46.4659 100.47 46.4659Z" fill="#333333"/>
                                        <path d="M118.989 46.4659C117.578 46.4659 116.544 46.1395 115.886 45.4867C115.228 44.8339 114.899 43.8071 114.899 42.4065V38.0523C114.899 36.639 115.228 35.6091 115.886 34.9626C116.55 34.3098 117.581 33.9897 118.98 34.0024H121.288C122.705 34.0024 123.74 34.3288 124.391 34.9816C125.049 35.6281 125.378 36.6548 125.378 38.0618V42.4065C125.378 43.8071 125.049 44.8339 124.391 45.4867C123.74 46.1395 122.705 46.4659 121.288 46.4659H118.989ZM118.989 45.268H121.288C122.009 45.268 122.578 45.1793 122.993 45.0018C123.414 44.818 123.714 44.517 123.893 44.0987C124.078 43.6804 124.171 43.1163 124.171 42.4065V38.0618C124.171 37.352 124.078 36.7879 123.893 36.3696C123.714 35.9513 123.414 35.6534 122.993 35.476C122.578 35.2922 122.009 35.2003 121.288 35.2003H118.98C118.264 35.1939 117.696 35.2795 117.275 35.457C116.86 35.6344 116.559 35.9323 116.374 36.3506C116.196 36.7689 116.106 37.3362 116.106 38.0523V42.4065C116.106 43.1163 116.196 43.6804 116.374 44.0987C116.559 44.517 116.863 44.818 117.284 45.0018C117.706 45.1793 118.274 45.268 118.989 45.268Z" fill="#333333"/>
                                        <path d="M131.728 46.4754C131.536 46.4754 131.386 46.4247 131.278 46.3233C131.175 46.2155 131.124 46.0666 131.124 45.8765V35.2003H127.169C126.977 35.2003 126.827 35.1496 126.718 35.0482C126.616 34.9404 126.565 34.7915 126.565 34.6014C126.565 34.4112 126.616 34.2654 126.718 34.164C126.827 34.0563 126.977 34.0024 127.169 34.0024H136.287C136.479 34.0024 136.625 34.0563 136.728 34.164C136.836 34.2654 136.89 34.4112 136.89 34.6014C136.89 34.7915 136.836 34.9404 136.728 35.0482C136.625 35.1496 136.479 35.2003 136.287 35.2003H132.331V45.8765C132.331 46.0603 132.277 46.206 132.168 46.3138C132.066 46.4215 131.919 46.4754 131.728 46.4754Z" fill="#333333"/>
                                        <path d="M142.167 46.4659C140.756 46.4659 139.722 46.1395 139.064 45.4867C138.406 44.8339 138.077 43.8071 138.077 42.4065V38.0523C138.077 36.639 138.406 35.6091 139.064 34.9626C139.728 34.3098 140.759 33.9897 142.158 34.0024H144.466C145.884 34.0024 146.918 34.3288 147.569 34.9816C148.227 35.6281 148.556 36.6548 148.556 38.0618V42.4065C148.556 43.8071 148.227 44.8339 147.569 45.4867C146.918 46.1395 145.884 46.4659 144.466 46.4659H142.167ZM142.167 45.268H144.466C145.188 45.268 145.756 45.1793 146.171 45.0018C146.592 44.818 146.892 44.517 147.071 44.0987C147.256 43.6804 147.349 43.1163 147.349 42.4065V38.0618C147.349 37.352 147.256 36.7879 147.071 36.3696C146.892 35.9513 146.592 35.6534 146.171 35.476C145.756 35.2922 145.188 35.2003 144.466 35.2003H142.158C141.443 35.1939 140.874 35.2795 140.453 35.457C140.038 35.6344 139.738 35.9323 139.552 36.3506C139.374 36.7689 139.284 37.3362 139.284 38.0523V42.4065C139.284 43.1163 139.374 43.6804 139.552 44.0987C139.738 44.517 140.041 44.818 140.462 45.0018C140.884 45.1793 141.452 45.268 142.167 45.268Z" fill="#333333"/>
                                        <path d="M160.299 46.4944C160.14 46.5895 159.986 46.618 159.839 46.58C159.699 46.5483 159.578 46.4564 159.475 46.3043L156.391 41.3607H153.154V45.867C153.154 46.2662 152.953 46.4659 152.551 46.4659C152.148 46.4659 151.947 46.2662 151.947 45.867V34.6014C151.947 34.2021 152.148 34.0024 152.551 34.0024H157.033C158.151 34.0024 159 34.2908 159.581 34.8675C160.162 35.4443 160.452 36.2872 160.452 37.3964V37.9668C160.452 38.9365 160.226 39.7034 159.772 40.2674C159.325 40.8315 158.665 41.1769 157.79 41.3037L160.51 45.6768C160.708 46.0127 160.638 46.2852 160.299 46.4944ZM153.154 40.1629H157.033C157.818 40.1629 158.384 39.9917 158.728 39.6495C159.073 39.3009 159.246 38.74 159.246 37.9668V37.3964C159.246 36.6231 159.073 36.0654 158.728 35.7232C158.384 35.3746 157.818 35.2003 157.033 35.2003H153.154V40.1629Z" fill="#333333"/>
                                        <path d="M166.707 46.4564C165.583 46.4564 164.734 46.2155 164.159 45.7339C163.591 45.2522 163.269 44.498 163.192 43.4712C163.179 43.2748 163.227 43.1226 163.336 43.0149C163.444 42.9072 163.594 42.8533 163.786 42.8533C163.977 42.8533 164.121 42.904 164.217 43.0054C164.319 43.1068 164.383 43.2526 164.408 43.4427C164.453 44.1209 164.648 44.593 164.993 44.8592C165.338 45.1254 165.909 45.2585 166.707 45.2585H169.466C170.347 45.2585 170.954 45.0937 171.286 44.7642C171.624 44.4282 171.793 43.8293 171.793 42.9674C171.793 42.0927 171.621 41.4906 171.276 41.1611C170.938 40.8252 170.334 40.6572 169.466 40.6572H166.928C165.772 40.6572 164.923 40.3878 164.38 39.8491C163.837 39.3041 163.566 38.4611 163.566 37.3203C163.566 36.1795 163.834 35.3429 164.37 34.8105C164.913 34.2718 165.759 34.0024 166.908 34.0024H169.456C170.51 34.0024 171.305 34.2306 171.841 34.6869C172.384 35.1369 172.694 35.8436 172.77 36.8069C172.789 36.9971 172.745 37.1492 172.636 37.2633C172.527 37.371 172.374 37.4249 172.176 37.4249C171.991 37.4249 171.847 37.3742 171.745 37.2728C171.643 37.165 171.582 37.0193 171.563 36.8355C171.512 36.2207 171.327 35.796 171.008 35.5615C170.689 35.3207 170.171 35.2003 169.456 35.2003H166.908C166.091 35.2003 165.529 35.3556 165.223 35.6661C164.923 35.9703 164.772 36.5217 164.772 37.3203C164.772 38.1189 164.926 38.6766 165.232 38.9935C165.545 39.3041 166.11 39.4593 166.928 39.4593H169.466C170.673 39.4593 171.563 39.7446 172.138 40.315C172.713 40.879 173 41.7632 173 42.9674C173 44.1652 172.713 45.0462 172.138 45.6103C171.57 46.1743 170.679 46.4564 169.466 46.4564H166.707Z" fill="#333333"/>
                                    </svg>
                                </td>
                                <td align="right">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/nWq-Aw/p7dtmXFXG0wU2d2e/?u=https%3A%2F%2Ftn-fyi.mckw.ru%2Fv%2F22YTAAAAZqgAahz3%2Fy8K8ZO8e_YfwU6KL%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #BDBDBD; font-size: 16px; line-height: 21px; text-decoration: underline;">Веб-версия</a>
                                </td>
                                <td width="10" style="width: 10px;">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="height: 30px; line-height: 30px; font-size: 8px;">&nbsp;</div>
                    </td>
                </tr>
                <!-- шапка - конец -->

                <!-- меню - начало -->
                <tr>
                    <td align="center" valign="top" style="background: #FFFFFF;">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 620px;">
                            <tbody>
                            <tr>
                                <td width="10" style="width: 10px;"></td>
                                <td align="center" style="background: #FAFAFA; border-radius: 10px;">
                                    <div class="mob_100" dir="ltr" style="display: inline-block; vertical-align: top; width: 620px;">
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;"></div>
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tbody><tr>
                                                <td class="mob_50" align="center" valign="center" width="120">
                                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/nmq-Aw/w9y9qJll6qH1ZvAF/?u=https%3A%2F%2Fwww.litres.ru%2Fnovie%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #767579; font-size: 14px; line-height: 21px; text-decoration: none;">Новинки</a>
                                                </td>
                                                <td class="mob_50" align="center" valign="center" width="120">
                                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/n2q-Aw/jNVadPDFu031wOIj/?u=https%3A%2F%2Fwww.litres.ru%2Fluchshie-knigi%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #767579; font-size: 14px; line-height: 21px; text-decoration: none;">Популярное</a>
                                                </td>
                                                <td class="mob_50" align="center" valign="center" width="120">
                                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/oGq-Aw/MVhWbojCPBDVUcir/?u=https%3A%2F%2Fwww.litres.ru%2Fchto-slushat%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #767579; font-size: 14px; line-height: 21px; text-decoration: none;">Аудиокниги</a>
                                                </td>
                                                <td class="mob_50" align="center" valign="center" width="160">
                                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/oWq-Aw/EYvWBs0OJRmCzOHi/?u=https%3A%2F%2Fwww.litres.ru%2Fchto-chitat%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #767579; font-size: 14px; line-height: 21px; text-decoration: none;">Что почитать?</a>
                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </div>

                                    <div style="height: 10px; line-height: 10px; font-size: 8px;">&nbsp;</div>
                                </td>
                                <td width="10" style="width: 10px;">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                    </td>
                </tr>
                <!-- меню - конец -->

                </tbody></table><table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td width="600">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/omq-Aw/jxGiW2XbSKC0a66P/?u=https%3A%2F%2Fwww.litres.ru%2Flitres_subscription%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3153/565b6490-32ea-446f-8530-1ab2dd615baa.png" width="600" alt="" style="display: block;">
                        </a>
                    </td>
                </tr>

                </tbody></table>

            <table align="center" width="600" height="20" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td height="20">
                    </td>
                </tr>
                </tbody></table>

            <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td width="600">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/o2q-Aw/sedK5vZB-dx6kmR_/?u=https%3A%2F%2Fwww.litres.ru%2Flitres_subscription%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3150/122cea9f-2da8-43ed-b3fd-e0eed9242c97.png" width="600" alt="" style="display: block;">
                        </a>
                    </td>
                </tr>

                </tbody></table>

            <table align="center" width="600" border="0" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF">
                <tbody><tr>
                    <td align="center">
<span style="font-family: Arial; font-size: 20px; color:#000000; line-height: 25px; font-weight: bold;">
Какие книги доступны владельцам Литрес Подписки?</span>
                    </td>
                </tr>
                </tbody></table>

            <table align="center" width="600" border="0" cellspacing="0" cellpadding="10">
                <tbody><tr>



                    <td width="290">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/pGq-Aw/8N_7kd5XUL4A9t6x/?u=https%3A%2F%2Fwww.litres.ru%2Fbook%2Fviktor-pelevin%2Fkgbt-kgbt-68010821%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3153/afbfde20-40cf-4c23-a881-be239b414d47.png" width="292" height="" alt="" style="display: block; border-radius: 15px;">
                        </a>
                    </td>

                    <td width="290">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/pWq-Aw/yCqP3Hz2h03jsVpi/?u=https%3A%2F%2Fwww.litres.ru%2Fbook%2Ffredrik-bakman%2Fvtoraya-zhizn-uve-20690188%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3153/40c0f103-2045-4992-81d1-e3bd033053bd.png" width="292" alt="" style="display: block; border-radius: 15px;">
                        </a>
                    </td>
                </tr>
                </tbody></table>


            <table align="center" width="600" height="10" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td height="10">
                    </td>
                </tr>
                </tbody></table>

            <table align="center" width="600" border="0" cellspacing="0" cellpadding="10">
                <tbody><tr>



                    <td width="290">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/pmq-Aw/Zhmwa3DEO6iWVLNj/?u=https%3A%2F%2Fwww.litres.ru%2Fbook%2Fdaniel-kaneman%2Fdumay-medlenno-reshay-bystro-6444517%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3153/80396548-b4f3-4d5c-863c-d9c0d2286dbe.png" width="292" height="" alt="" style="display: block; border-radius: 15px;">
                        </a>
                    </td>

                    <td width="290">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/p2q-Aw/lY5kMWBjd3-Y1rMM/?u=https%3A%2F%2Fwww.litres.ru%2Fbook%2Frobert-lihi-13115294%2Fsvoboda-ot-trevogi-spravsya-s-trevogoy-poka-ona-ne-ra-28907894%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3153/b92deef4-a9c4-4da9-aa3f-a6868f775f9a.png" width="292" alt="" style="display: block; border-radius: 15px;">
                        </a>
                    </td>
                </tr>
                </tbody></table>





            <table align="center" width="600" height="10" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td height="10">
                    </td>
                </tr>
                </tbody></table>

            <table align="center" width="600" border="0" cellspacing="0" cellpadding="10">
                <tbody><tr>



                    <td width="290">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/qGq-Aw/NwWAuLTKVJlC0gDb/?u=https%3A%2F%2Fwww.litres.ru%2Fbook%2Fviktor-dashkevich%2Fgraf-averin-koldun-rossiyskoy-imperii-69526501%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3153/9cd4dc6f-e189-4011-ae8a-f723c459917a.png" width="292" height="" alt="" style="display: block; border-radius: 15px;">
                        </a>
                    </td>

                    <td width="290">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/qWq-Aw/AWArRP2tGkrv38SU/?u=https%3A%2F%2Fwww.litres.ru%2Fbook%2Fha-dzhun-chang%2Fkak-ustroena-ekonomika-9361857%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3153/c824ae63-bb20-4041-bc98-60bfb1a2b2be.png" width="292" alt="" style="display: block; border-radius: 15px;">
                        </a>
                    </td>
                </tr>
                </tbody></table>

            <table align="center" width="600" height="10" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td height="10">
                    </td>
                </tr>
                </tbody></table>

            <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td width="600">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/qmq-Aw/W-cFvWP44T1_N2jr/?u=https%3A%2F%2Fwww.litres.ru%2Fpopular%2F%3Fonly_litres_subscription_arts%3Dtrue%26utm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3128/3b17b148-6ff6-4f79-a2f1-5298e8fac15f.png" width="600" alt="" style="display: block;">
                        </a>
                    </td>
                </tr>

                </tbody></table>


            <table align="center" width="600" height="20" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td height="20">
                    </td>
                </tr>
                </tbody></table>

            <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td width="600">
                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/q2q-Aw/pn3np5b6IKKxOQlF/?u=https%3A%2F%2Fwww.litres.ru%2Flitres_subscription%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank">
                            <img src="https://email-images.mindbox.ru/Litres/3153/628f6fec-5b77-4493-a19c-49c15bfa0984.png" width="600" alt="" style="display: block;">
                        </a>
                    </td>
                </tr>

                </tbody></table>


            <table align="center" width="600" height="20" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td height="20">
                    </td>
                </tr>
                </tbody></table>



            <!-- заголовок - начало -->
        </td></tr><tr>
        <td align="center" valign="top" style="background: #FFFFFF;">
            <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr><td align="center" valign="top" width="620"><![endif]-->
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 620px;">
                <tbody><tr>
                    <td width="10" style="width: 10px;">&nbsp;</td>
                    <td align="left" style="border-top: none; border-left: none; border-right: none;">
                        <div style="height: 40px; line-height: 40px; font-size: 8px;">&nbsp;</div>
                        <div style="font-family: Arial, sans-serif; color: #000000; font-size: 30px; line-height: 34px;">
                            Популярные разделы Литрес</div>
                        <div style="height: 6px; line-height: 6px; font-size: 8px;">&nbsp;</div>
                    </td>
                    <td width="10" style="width: 10px;">&nbsp;</td>
                </tr>
                </tbody></table>
        </td>
    </tr>
    <!-- заголовок - конец -->

    <!-- категории 1 - начало -->
    <tr>
        <td align="center" valign="top" style="background: #FFFFFF;">
            <div style="height: 4px; line-height: 4px; font-size: 8px;">&nbsp;</div>
            <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr><td align="center" valign="top" width="620"><![endif]-->
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 620px;">
                <tbody><tr>
                    <td width="10" style="width: 10px;">&nbsp;</td>
                    <td align="center">
                        <!--[if (gte mso 9)|(IE)]>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr><td dir="ltr" align="center" valign="top" width="193"><![endif]-->
                        <div class="mob_100" dir="ltr" style="display: inline-block; vertical-align: top; width: 193px;">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td width="10" style="width: 10px;">&nbsp;</td>
                                    <td align="center" valign="top">
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/rGq-Aw/MVZGw9mKSTxei5ky/?u=https%3A%2F%2Fwww.litres.ru%2Fnew%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 173px;">
                                            <img src="https://email-images.mindbox.ru/Litres/2251/cfa0993e-49cd-4982-8654-db692d14b7a1.png" width="173" border="0" alt="" style="display: block; width: 100%; max-width: 173px;">
                                        </a>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">
                                            &nbsp;</div>
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/rWq-Aw/cE6qCIXLKmXOn46q/?u=https%3A%2F%2Fwww.litres.ru%2Fnew%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #000000; font-size: 16px; line-height: 18px; font-weight: bold; text-decoration: none;">Новинки</a>
                                    </td>
                                    <td width="10" style="width: 10px;">&nbsp;</td>
                                </tr>
                                </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]></td><td dir="ltr" align="center" valign="top" width="193"><![endif]-->
                        <div class="mob_100" dir="ltr" style="display: inline-block; vertical-align: top; width: 193px;">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td width="10" style="width: 10px;">&nbsp;</td>
                                    <td align="center" valign="top">
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/rmq-Aw/cz8MlARzDe-uWP5n/?u=https%3A%2F%2Fwww.litres.ru%2Fpopular%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 173px;">
                                            <img src="https://email-images.mindbox.ru/Litres/2251/420ca11b-01f7-4294-8a68-497833def58e.png" width="173" border="0" alt="" style="display: block; width: 100%; max-width: 173px;">
                                        </a>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">
                                            &nbsp;</div>
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/r2q-Aw/QBB6e8Y6l5crqWww/?u=https%3A%2F%2Fwww.litres.ru%2Fpopular%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #000000; font-size: 16px; line-height: 18px; font-weight: bold; text-decoration: none;">Лучшие
                                            книги</a>
                                    </td>
                                    <td width="10" style="width: 10px;">&nbsp;</td>
                                </tr>
                                </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]></td><td dir="ltr" align="center" valign="top" width="193"><![endif]-->
                        <div class="mob_100" dir="ltr" style="display: inline-block; vertical-align: top; width: 193px;">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td width="10" style="width: 10px;">&nbsp;</td>
                                    <td align="center" valign="top">
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/sGq-Aw/jwrb4QgmDLREhlGm/?u=https%3A%2F%2Fwww.litres.ru%2Fchto-slushat%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 173px;">
                                            <img src="https://email-images.mindbox.ru/Litres/2251/a5e5f924-322f-4d61-9c3d-585ade8ded5c.png" width="173" border="0" alt="" style="display: block; width: 100%; max-width: 173px;">
                                        </a>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">
                                            &nbsp;</div>
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/sWq-Aw/NypF6WAgWKqjUS2y/?u=https%3A%2F%2Fwww.litres.ru%2Fchto-slushat%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #000000; font-size: 16px; line-height: 18px; font-weight: bold; text-decoration: none;">Аудио</a>
                                    </td>
                                    <td width="10" style="width: 10px;">&nbsp;</td>
                                </tr>
                                </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
                        </td></tr>
                        </table><![endif]-->
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tbody><tr>
                                <td width="20" style="width: 20px;">&nbsp;</td>
                                <td height="20" style="height: 20px; border-width: 1px; border-style: dashed; border-color: #9D9C9F; border-top: none; border-left: none; border-right: none;">
                                    &nbsp;</td>
                                <td width="20" style="width: 20px;">&nbsp;</td>
                            </tr>
                            </tbody></table>
                        <!--[if (gte mso 9)|(IE)]>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr><td dir="ltr" align="center" valign="top" width="286"><![endif]-->
                        <div class="mob_100" dir="ltr" style="display: inline-block; vertical-align: top; width: 286px;">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td width="5" style="width: 5px;">&nbsp;</td>
                                    <td align="center" valign="top" width="133" height="172" style="height: 172px;">
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/smq-Aw/13XD47XlYODozQ-O/?u=https%3A%2F%2Fwww.litres.ru%2Fluchshie-avtori%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 125px;">
                                            <img src="https://email-images.mindbox.ru/Litres/2251/a0b29f31-9ba5-41cf-af07-a51cafd6f313.png" width="125" border="0" alt="" style="display: block; margin-bottom: 10px; width: 100%; max-width: 125px;">
                                        </a>
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/s2q-Aw/u3uEPrKD5dt5vIjz/?u=https%3A%2F%2Fwww.litres.ru%2Fluchshie-avtori%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #000000; font-size: 16px; line-height: 18px; font-weight: bold; text-decoration: none;">Популярные
                                            авторы</a>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">
                                            &nbsp;</div>
                                    </td>
                                    <td width="10" style="width: 10px;">&nbsp;</td>
                                    <td align="center" valign="top" width="133" height="172" style="height: 172px;">
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/tGq-Aw/sr6hNrvOanfFFQoQ/?u=https%3A%2F%2Fwww.litres.ru%2Fvibor-redaktsii%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 125px;">
                                            <img src="https://email-images.mindbox.ru/Litres/2251/d9b336c1-5cda-4438-bb5c-c82d0f8d572a.png" width="125" border="0" alt="" style="display: block; margin-bottom: 10px; width: 100%; max-width: 125px;">
                                        </a>
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/tWq-Aw/SVZcsEZvc5cGtynD/?u=https%3A%2F%2Fwww.litres.ru%2Fvibor-redaktsii%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #000000; font-size: 16px; line-height: 18px; font-weight: bold; text-decoration: none;">Выбор
                                            редакции</a>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">
                                            &nbsp;</div>
                                    </td>
                                    <td width="5" style="width: 5px;">&nbsp;</td>
                                </tr>
                                </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]></td><td dir="ltr" align="center" valign="top" width="286"><![endif]-->
                        <div class="mob_100" dir="ltr" style="display: inline-block; vertical-align: top; width: 286px;">
                            <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td width="5" style="width: 5px;">&nbsp;</td>
                                    <td align="center" valign="top" width="133" height="172" style="height: 172px;">
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/tmq-Aw/ohkYKVNnBH0epUpc/?u=https%3A%2F%2Fwww.litres.ru%2Fkollekcii-knig%2Fbestsellery-proverennye-vremenem-hudozhka%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 125px;">
                                            <img src="https://email-images.mindbox.ru/Litres/2251/7a11afe1-4773-4e23-86c3-50008b3f1373.png" width="125" border="0" alt="" style="display: block; margin-bottom: 10px; width: 100%; max-width: 125px;">
                                        </a>
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/t2q-Aw/q4-6tWUWN30LboJv/?u=https%3A%2F%2Fwww.litres.ru%2Fkollekcii-knig%2Fbestsellery-proverennye-vremenem-hudozhka%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #000000; font-size: 16px; line-height: 18px; font-weight: bold; text-decoration: none;">Хиты,
                                            проверенные временем</a>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">
                                            &nbsp;</div>
                                    </td>
                                    <td width="10" style="width: 10px;">&nbsp;</td>
                                    <td align="center" valign="top" width="133" height="172" style="height: 172px;">
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/uGq-Aw/5C3MXuXXdbOKGCvh/?u=https%3A%2F%2Fwww.litres.ru%2Ftags%2Ftolko-na-litres%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 125px;">
                                            <img src="https://email-images.mindbox.ru/Litres/2251/a033d818-e4ea-4496-a9e8-f31f3b5eafc7.png" width="125" border="0" alt="" style="display: block; margin-bottom: 10px; width: 100%; max-width: 125px;">
                                        </a>
                                        <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/uWq-Aw/bJuFbZhKevQRMeXV/?u=https%3A%2F%2Fwww.litres.ru%2Ftags%2Ftolko-na-litres%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #000000; font-size: 16px; line-height: 18px; font-weight: bold; text-decoration: none;">Только
                                            на&nbsp;Литрес</a>
                                        <div style="height: 10px; line-height: 10px; font-size: 8px;">
                                            &nbsp;</div>
                                    </td>
                                    <td width="5" style="width: 5px;">&nbsp;</td>
                                </tr>
                                </tbody></table>
                        </div>
                        <!--[if (gte mso 9)|(IE)]>
                        </td></tr>
                        </table><![endif]-->
                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                    </td>
                    <td width="10" style="width: 10px;"></td>
                </tr>
                </tbody></table>
            <!--[if (gte mso 9)|(IE)]>
            </td></tr>
            </table><![endif]-->
        </td>
    </tr>
    <!-- категории 1 - конец -->



    <!-- контакты - начало -->
    <tr>
        <td align="center" valign="top" style="background: #FFFFFF;">
            <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr><td align="center" valign="top" width="620"><![endif]-->
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 620px;">
                <tbody><tr>
                    <td width="10" style="width: 10px;">&nbsp;</td>
                    <td align="center">
                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                        <div style="font-family: Arial, sans-serif; color: #000000; font-size: 20px; line-height: 23px; font-weight: bold;">
                            Литрес – цифровой сервис электронных&nbsp;и&nbsp;аудиокниг, а также другого контента: подкасты, спектакли, интервью
                        </div>
                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                        <table cellpadding="0" cellspacing="0" border="0" width="70%" style="min-width: 340px;">
                            <tbody><tr>
                                <td align="center" valign="top" width="31.5%" style="width: 31.5%; max-width: 31.5%; min-width: 106px;">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/umq-Aw/PkB6v2OV8riALUID/?u=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dru.litres.android%26hl%3Dru%26gl%3DUS%26utm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 118px;">
                                        <img src="https://email-images.mindbox.ru/53cda96f-c9fb-4860-975b-adc36feb274d/18.png" width="118" border="0" alt="Android" style="display: block; width: 100%; max-width: 118px;">
                                    </a>
                                </td>
                                <td width="10" style="width: 10px; min-width: 10px;">&nbsp;</td>
                                <td align="center" valign="top" width="31.5%" style="width: 31.5%; max-width: 31.5%; min-width: 106px;">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/u2q-Aw/X5UYhdKjn3GAAXjf/?u=https%3A%2F%2Fapps.apple.com%2Fru%2Fapp%2F%25D0%25BA%25D0%25BD%25D0%25B8%25D0%25B3%25D0%25B8-%25D0%25B8-%25D0%25B0%25D1%2583%25D0%25B4%25D0%25B8%25D0%25BE%25D0%25BA%25D0%25BD%25D0%25B8%25D0%25B3%25D0%25B8%2Fid438441429%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 118px;">
                                        <img src="https://email-images.mindbox.ru/a3a7c766-08c0-425e-a6eb-ac115da7772d/17.png" width="118" border="0" alt="IOs" style="display: block; width: 100%; max-width: 118px;">
                                    </a>
                                </td>
                                <td width="10" style="width: 10px; min-width: 10px;">&nbsp;</td>
                                <td align="center" valign="top" width="31.5%" style="width: 31.5%; max-width: 31.5%; min-width: 106px;">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/vGq-Aw/8nr4NvQmCTxlt6lV/?u=https%3A%2F%2Fwww.litres.ru%2Fgetapp%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 118px;">
                                        <img src="https://email-images.mindbox.ru/71ebfef1-1119-4c1a-b4fe-4235a8e4380a/28.png" width="118" border="0" alt="Huawei" style="display: block; width: 100%; max-width: 118px;">
                                    </a>
                                </td>
                                <td width="10" style="width: 10px; min-width: 10px;">&nbsp;</td>
                                <td align="center" valign="top" width="31.5%" style="width: 31.5%; max-width: 31.5%; min-width: 100px;">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/vWq-Aw/4TZ3rYQF0GbL2LJQ/?u=https%3A%2F%2Fapps.rustore.ru%2Fapp%2Fru.litres.android%3Frsm%3D1%26mt_link_id%3Dqdstn0%26utm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 118px;">
                                        <img src="https://email-images.mindbox.ru/Litres/1896/661481d0-2687-4446-a46b-a7b061ddf734.png" width="118" border="0" alt="rustore" style="display: block; width: 100%; max-width: 118px;">
                                    </a>
                                </td>
                            </tr>
                            </tbody></table>
                        <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;</div>
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tbody><tr>
                                <td align="center" valign="top" width="60" style="width: 60px;">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/vmq-Aw/O2DCIIRDNXZ-FZVp/?u=https%3A%2F%2Fvk.com%2Fmylitres%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 32px;">
                                        <img src="https://email-images.mindbox.ru/Litres/2243/15bb61b1-5d11-4976-89c9-bbcac82f59f7.png" width="32" border="0" alt="VK" style="display: block; width: 100%; max-width: 32px;">
                                    </a>
                                </td>

                                <td align="center" valign="top" width="60" style="width: 60px;">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/v2q-Aw/S8Ed88pEWgM1kJlE/?u=https%3A%2F%2Ft.me%2FLitRes_ebooks%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 32px;">
                                        <img src="https://email-images.mindbox.ru/Litres/2243/d2a0e7fd-e46e-4ddd-960c-0249ee4f1c64.png" width="32" border="0" alt="TG" style="display: block; width: 100%; max-width: 32px;">
                                    </a>
                                </td>
                                <td align="center" valign="top" width="60" style="width: 60px;">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/wGq-Aw/IoBf2a99elax-e7V/?u=https%3A%2F%2Fwww.litres.ru%2Fjournal%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 32px;">
                                        <img src="https://email-images.mindbox.ru/Litres/2243/b67ff852-75da-422d-b4b5-f13adfbdd5b1.png" width="32" border="0" alt="journal" style="display: block; width: 100%; max-width: 32px;">
                                    </a>
                                </td>

                                <td align="center" valign="top" width="60" style="width: 60px;">
                                    <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/wWq-Aw/A0rOQwW3oz-x_C1t/?u=https%3A%2F%2Fwww.youtube.com%2F%40MyBookbyLitres%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="display: block; max-width: 32px;">
                                        <img src="https://email-images.mindbox.ru/Litres/2251/8aeb090f-247e-45cb-8165-e224f51c3e9e.png" width="32" border="0" alt="YT" style="display: block; width: 100%; max-width: 32px;">
                                    </a>
                                </td>
                            </tr>
                            </tbody></table>
                        <div style="height: 26px; line-height: 26px; font-size: 8px;">&nbsp;</div>
                    </td>
                    <td width="10" style="width: 10px;">&nbsp;</td>
                </tr>
                </tbody></table>
            <!--[if (gte mso 9)|(IE)]>
            </td></tr>
            </table><![endif]-->
        </td>
    </tr>
    <!-- контакты - конец -->
    <!-- футер скидки и акции - начало -->
    <tr>
        <td align="center" valign="top" style="background: #FFFFFF;">
            <!--[if (gte mso 9)|(IE)]>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr><td align="center" valign="top" width="620"><![endif]-->
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 620px;">
                <tbody><tr>
                    <td width="10" style="width: 10px;">&nbsp;</td>
                    <td align="center" style="background: #FAFAFA; border-radius: 10px 10px 0px 0px;">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width: 620px;">
                            <tbody><tr>
                                <td width="20" style="width: 20px;">&nbsp;</td>
                                <td align="center">
                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                                    </div>
                                    <div style="font-family: Arial, sans-serif; color: #3B393F; font-size: 14px; line-height: 22px;">
                                        Вы&nbsp;получили это письмо, потому что подписались
                                        на&nbsp;рассылку на&nbsp;нашем сайте <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/wmq-Aw/iPLJjgNB8a_TD_Sd/?u=https%3A%2F%2Fwww.litres.ru%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #3B393F; font-size: 14px; line-height: 22px; text-decoration: none; white-space: nowrap;">www.litres.ru</a>
                                        или через мобильные приложения Литрес. Если вы не хотите получать письма с нашими акциями, нажмите <a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/w2q-Aw/Y_IbuX5iuKSVzSaY/?u=https%3A%2F%2Ftn-fyi.mckw.ru%2Fu%2F22YTAAAAZqgAahz3%2Fy8K8ZO8e_YfwU6KL%2Ftrue%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #3B393F; font-size: 14px; line-height: 22px; text-decoration: underline;"> сюда</a>.Управление тематиками рассылок доступно в&nbsp;<a href="https://tn-fyi.mckw.ru/c/22YTAAAAZqgAahz3/xGq-Aw/ZOtarEDyQaUNSFUn/?u=https%3A%2F%2Fwww.litres.ru%2Fpages%2Fpersonal_cabinet_login%2F%3Futm_source%3DMindbox%26utm_medium%3Demail_mass_promo%26utm_campaign%3D19-11-2023_Podpiska" target="_blank" style="font-family: Arial, sans-serif; color: #3B393F; font-size: 14px; line-height: 22px; text-decoration: underline;">личном&nbsp;кабинете</a>.
                                    </div>
                                    <div style="height: 20px; line-height: 20px; font-size: 8px;">&nbsp;
                                    </div>
                                    <div style="font-family: Arial, sans-serif; color: #3B393F; font-size: 14px; line-height: 22px;">
                                        ООО «Литрес», ИНН&nbsp;7719571260,
                                        ОГРН&nbsp;1057748936398, <a href="tel:88003332737" target="_blank" style="font-family: Arial, sans-serif; color: #3B393F; font-size: 14px; line-height: 22px; text-decoration: none; white-space: nowrap;">8
                                            (800) 333-27-37</a><br>Юридический адрес:
                                        12‌31‌12, Ро‌сс‌ия,
                                        г.&nbsp;Мо‌ск‌ва, 1-ый
                                        Красно‌гва‌рде‌йс‌кий пр‌ое‌зд, 15
                                    </div>
                                    <div style="height: 30px; line-height: 30px; font-size: 8px;">&nbsp;
                                    </div>
                                </td>
                                <td width="20" style="width: 20px;">&nbsp;</td>
                            </tr>
                            </tbody></table>
                    </td>
                    <td width="10" style="width: 10px;">&nbsp;</td>
                </tr>
                </tbody></table>
            <!--[if (gte mso 9)|(IE)]>
            </td></tr>
            </table><![endif]-->
        </td>
    </tr>
    <!-- футер скидки и акции - конец -->

    </tbody></table>
</body>
</html>
