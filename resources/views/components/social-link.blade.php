@props([
    'link',
    'icon',
])

@php
    $icons = [
        'vk' =>
            '<svg class="social-link__icon" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 363.301 363.301"><path d="M347.506 240.442c-7.91-9.495-16.899-18.005-25.592-26.235-3.091-2.927-6.287-5.953-9.368-8.962-8.845-8.648-9.167-11.897-2.164-21.72 4.845-6.771 9.982-13.551 14.95-20.108 4.506-5.949 9.166-12.101 13.632-18.273l.917-1.269c8.536-11.811 17.364-24.024 22.062-38.757 1.22-3.887 2.501-9.607-.428-14.39-2.927-4.779-8.605-6.237-12.622-6.918-1.987-.337-3.96-.383-5.791-.383l-55.901-.04-.462-.004c-8.452 0-14.148 3.983-17.412 12.178-3.116 7.83-6.539 16.168-10.445 24.096-7.773 15.787-17.645 33.97-31.93 49.135l-.604.645c-1.687 1.813-3.598 3.866-4.995 3.866-.214 0-.447-.041-.711-.124-2.959-1.153-4.945-8.316-4.855-11.648a6.35 6.35 0 0 0 .002-.138l-.039-64.61c0-.224-.016-.446-.045-.668-1.422-10.503-4.572-17.041-16.474-19.372a4.923 4.923 0 0 0-.961-.094h-58.126c-9.47 0-14.688 3.849-19.593 9.61-1.324 1.54-4.08 4.746-2.714 8.635 1.386 3.947 5.885 4.791 7.35 5.065 7.272 1.384 11.371 5.832 12.532 13.604 2.027 13.496 2.276 27.901.784 45.334-.416 4.845-1.239 8.587-2.595 11.784-.315.746-1.432 3.181-2.571 3.182-.362 0-1.409-.142-3.316-1.456-4.509-3.089-7.808-7.497-11.654-12.942-13.084-18.491-24.065-38.861-33.575-62.288-3.527-8.624-10.114-13.452-18.556-13.594-9.276-.141-17.686-.209-25.707-.209-8.764 0-16.889.081-24.823.246-6.792.12-11.49 2.156-13.962 6.056-2.476 3.903-2.315 9.03.479 15.236 22.366 49.723 42.645 85.876 65.755 117.228 16.193 21.938 32.435 37.123 51.109 47.784 19.674 11.255 41.722 16.727 67.402 16.727 2.911 0 5.921-.071 8.956-.213 14.922-.727 20.458-6.128 21.158-20.657.333-7.425 1.145-15.212 4.795-21.853 2.304-4.184 4.452-4.184 5.158-4.184 1.36 0 3.046.626 4.857 1.799 3.248 2.12 6.033 4.96 8.316 7.441 2.149 2.357 4.274 4.738 6.401 7.12 4.59 5.141 9.336 10.456 14.294 15.497 10.852 11.041 22.807 15.897 36.538 14.843h51.252c.109 0 .219-.004.328-.011 5.107-.337 9.53-3.17 12.135-7.772 3.227-5.701 3.162-12.974-.174-19.46-3.785-7.334-8.695-13.6-12.997-18.759z"/></svg>',

        'tg' => '<svg width="100%" height="100%" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
          <path class="social-link__icon" d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"/>
        </svg>',

        'whatsapp' => '
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="100%" width="100%" version="1.1" id="Layer_1" viewBox="0 0 308 308" xml:space="preserve">
                <g id="XMLID_468_" class="social-link__icon">
                    <path id="XMLID_469_" d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156   c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687   c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887   c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153   c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348   c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802   c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922   c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0   c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458   C233.168,179.508,230.845,178.393,227.904,176.981z"/>
                    <path id="XMLID_470_" d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716   c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396   c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z    M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188   l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677   c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867   C276.546,215.678,222.799,268.994,156.734,268.994z"/>
                </g>
            </svg>
         '
      ]
@endphp


<a class="social-link" href="{{ $link }}" target="_blank">
    {!! $icons[$icon] !!}
</a>
