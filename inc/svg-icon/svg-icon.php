<?php



function drillcorp_get_svg_icon($icon)
{
    $svg_icon = array(
        'right_arrow_bigger' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.3306 17.5557C11.3456 17.5708 11.8036 17.6856 12.3485 17.8108C12.8934 17.936 13.3451 18.0194 13.3524 17.9961C13.3596 17.9728 13.416 17.5946 13.4776 17.1556C13.6015 16.2741 13.9013 15.2449 14.2217 14.6013C15.2204 12.5952 17.0123 11.267 19.1856 10.9218L19.739 10.8338V9.94765V9.06142L19.2374 8.97726C15.9511 8.42593 13.8086 5.96872 13.4078 2.29151C13.3817 2.05139 13.3504 1.855 13.3383 1.855C13.2275 1.855 11.391 2.29759 11.3563 2.33265C11.3312 2.358 11.3498 2.5831 11.3979 2.83279C11.9293 5.59765 13.4509 7.84749 15.4255 8.7882L15.8992 9.01386L6.15903 9.03153L0 9.04275V10.8362L6.17488 10.8474L15.892 10.8652L15.2941 11.1682C13.7427 11.9541 12.5145 13.4958 11.7913 15.5652C11.5852 16.1547 11.2742 17.4988 11.3306 17.5557Z" fill="#FFF84B"/>
                        </svg>',

        'download_arrow' => '<svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.8 6.99382e-08L4.8 9.736L1.928 6.872L0.8 8L5.10686 12.3069C5.37921 12.5792 5.82079 12.5792 6.09314 12.3069L10.4 8L9.272 6.872L6.4 9.736L6.4 0L4.8 6.99382e-08Z" fill="#50555E"/>
                                <path d="M0 14.4H11.2V16H0V14.4Z" fill="#50555E"/>
                            </svg>',

        'left_arrow' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.49995 12L19 12" stroke="#0D1A21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.9961 18C10.9961 18 4.99619 13.5811 4.99609 12C4.99609 10.4188 10.9961 6 10.9961 6" stroke="#0D1A21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        ',

        'right_arrow' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.5001 12L5 12" stroke="#0D1A21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.0039 6C13.0039 6 19.0038 10.4189 19.0039 12C19.0039 13.5812 13.0039 18 13.0039 18" stroke="#0D1A21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        ',

        'down_angle' => '<svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.617187 0.619195L7.61724 7.61914L14.6172 0.619139" stroke="#E2EFF4" stroke-width="1.75" stroke-miterlimit="16"/>
                        </svg>',


    );

    return $svg_icon[$icon];
}
