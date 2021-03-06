<?php
// 如：db:seed 或者 清空数据库命令的地方调用
function insanity_check()
{
    if (App::environment('production')) {
        exit('别傻了? 这是线上环境呀。');
    }
}

function cdn($filepath)
{
    if (config('app.url_static')) {
        return config('app.url_static') . $filepath;
    } else {
        return config('app.url') . $filepath;
    }
}

function get_cdn_domain()
{
    return config('app.url_static') ?: config('app.url');
}

function get_user_static_domain()
{
    return config('app.user_static') ?: config('app.url');
}

//语言翻译
function lang($text, $parameters = [])
{
    return str_replace('FantasyStar.', '', trans('FantasyStar.'.$text, $parameters));
}

// function admin_link($title, $path, $id = '')
// {
//     return '<a href="'.admin_url($path, $id).'" target="_blank">' . $title . '</a>';
// }

// function admin_url($path, $id = '')
// {
//     return env('APP_URL') . "/admin/$path" . ($id ? '/'.$id : '');
// }

// function admin_enum_style_output($value, $reverse = false)
// {
//     if ($reverse) {
//         $class = ($value === true || $value == 'yes') ? 'danger' : 'success';
//     } else {
//         $class = ($value === true || $value == 'yes') ? 'success' : 'danger';
//     }

//     return '<span class="label bg-'.$class.'">'.$value.'</span>';
// }

function navViewActive($anchor)
{
    return Route::currentRouteName() == $anchor ? 'active' : '';
}

function model_link($title, $model, $id)
{
    return '<a href="'.model_url($model, $id).'" target="_blank">' . $title . '</a>';
}

function model_url($model, $id)
{
    return env('APP_URL') . "/$model/$id";
}

function per_page($default = null)
{
    $max_per_page = config('api.max_per_page');
    $per_page = (Input::get('per_page') ?: $default) ?: config('api.default_per_page');

    return (int) ($per_page < $max_per_page ? $per_page : $max_per_page);
}

/**
 * 生成用户客户端 URL Schema 技术的链接.
 */
function schema_url($path, $parameters = [])
{
    $query = empty($parameters) ? '' : '?'.http_build_query($parameters);

    return strtolower(config('app.name')).'://'.trim($path, '/').$query;
}

// formartted Illuminate\Support\MessageBag
function output_msb(\Illuminate\Support\MessageBag $messageBag){
    return implode(", ", $messageBag->all());
}

function get_platform(){
    return Request::header('X-Client-Platform');
}

function is_request_from_api()
{
    return $_SERVER['SERVER_NAME'] == env('API_DOMAIN');
}

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

// 见：https://developer.qiniu.com/dora/api/basic-processing-images-imageview2
function img_crop($filepath, $width = 0, $height = 0, $mode = 1)
{
    return $filepath . "?imageView2/$mode/w/{$width}/h/{$height}";
}


function setting($key, $default = '')
{
    if ( ! config()->get('settings')) {
        // Decode the settings to an associative array.
        $site_settings = json_decode(file_get_contents(storage_path('/administrator_settings/site.json')), true);
        // Add the site settings to the application configuration
        config()->set('settings', $site_settings);
    }

    // Access a setting, supplying a default value
    return config()->get('settings.'.$key, $default);
}

function is_route($name)
{
    return Request::route()->getName() == $name;
}

function get_image_links($html)
{
    $image_links = get_images_from_html($html);
    $result = [];
    foreach ($image_links as $url) {
        if (strpos($url, config('app.url_static')) !== false) {
            $result[] = strtok($url, '?');
        }
    }
    return $result;
}

function get_images_from_html($html)
{
    $doc = new DOMDocument();
    @$doc->loadHTML($html);

    $img_tags = $doc->getElementsByTagName('img');
    $result = [];
    foreach ($img_tags as $img) {
        $result[] = $img->getAttribute('src');
    }
    return $result;
}

function slug_trans($word)
{
    return Phphub\Handler\SlugTranslate::translate($word);
}

// Shortens a number and attaches K, M, B, etc. accordingly
function number_shorten($number, $precision = 1, $divisors = null) {

    if ($number < 1000) {
        return $number;
    }
    // Setup default $divisors if not provided
    if (!isset($divisors)) {
        $divisors = array(
            pow(1000, 0) => '', // 1000^0 == 1
            pow(1000, 1) => 'k', // Thousand
            pow(1000, 2) => 'm', // Million
            pow(1000, 3) => 'b', // Billion
            pow(1000, 4) => 't', // Trillion
            pow(1000, 5) => 'Qa', // Quadrillion
            pow(1000, 6) => 'Qi', // Quintillion
        );
    }

    // Loop through each $divisor and find the
    // lowest amount that matches
    foreach ($divisors as $divisor => $shorthand) {
        if (abs($number) < ($divisor * 1000)) {
            // We found a match!
            break;
        }
    }

    // We found our match, or there were no matches.
    // Either way, use the last defined value for $divisor.
    return number_format($number / $divisor, $precision) . $shorthand;
}

function domain_from_url($url)
{
    $parse = parse_url($url);
    return $parse['host'];
}

//yunyou - custom
//生成彩色标签
function colorful_label($style , $para){
    return '<span class="label label-'.$style.'">'.$para.'</span>';
}

//截取字符显示省略号
function sub_str($str, $length = 0, $append = true)
{
    $str = trim($str);
    $strlength = strlen($str);

    if ($length == 0 || $length >= $strlength)
    {
        return $str;  //截取长度等于0或大于等于本字符串的长度，返回字符串本身
    }
    elseif ($length < 0)  //如果截取长度为负数
    {
        $length = $strlength + $length;//那么截取长度就等于字符串长度减去截取长度
        if ($length < 0)
        {
            $length = $strlength;//如果截取长度的绝对值大于字符串本身长度，则截取长度取字符串本身的长度
        }
    }

    if (function_exists('mb_substr'))
    {
        $newstr = mb_substr($str, 0, $length, 'utf-8');
    }
    elseif (function_exists('iconv_substr'))
    {
        $newstr = iconv_substr($str, 0, $length, 'utf-8');
    }
    else
    {
        //$newstr = trim_right(substr($str, 0, $length));
        $newstr = substr($str, 0, $length);
    }

    if ($append && $str != $newstr)
    {
        $newstr .= '...';
    }

    return $newstr;
}