<?php


use App\Models\Label\Label;
use App\Models\Screen\Screen;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
if (version_compare(phpversion(), '7.1', '>=')) {
    ini_set('precision', 14);
    ini_set('serialize_precision', -1);
}
function saveImage($image, $folder)
{
    //save photo in folder
    $file_extension = $image->getClientOriginalExtension();
    $file_name = md5(uniqid() . time()) . '.' . $file_extension;
    $path = public_path($folder);
    $image->move($path, $file_name);
    return $file_name;
}



function app_url($url)
{
    return request()->server('HTTP_X_FORWARDED_PROTO') == 'https' ? secure_url($url) : url($url);
}
function time_elapsed_string($datetime, $full = false) {
    if (getLang() =='ar'){
        $ago_text = 'منذ';
        $just_now = 'الان';
        $string = array(
            'y' => 'سنة',
            'm' => 'شهر',
            'w' => 'اسبوع',
            'd' => 'يوم',
            'h' => 'ساعة',
            'i' => 'دقيقة',
            's' => 'ثانية',
        );
    }else{
        $ago_text = 'ago';
        $just_now = 'just now';

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
    }
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $lang = getLang();
    $now = $lang === 'ar' ? 'الاَن' : 'Now';
    $and = $lang === 'ar' ? ' و ' : ' and ';
    $since = $lang === 'ar' ? 'منذ ' : ' ago';
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' ' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? ($lang === 'ar' ? $since . implode(' :  ', $string) : implode(' : ', $string) ) : $now;


}
function getLanguage()
{
    $lang = \App\Models\Languages::where('lang_code', getLang())->first();
    return $lang;

}




function app_asset($path, $secure = null)
{
    return asset($path, $secure);
}

function getLang()
{
    return session('lang') ?? 'en';
}


function labels($screen_id)
{
    $labels = [];

    $language = \App\Models\Languages::where('lang_code', getLang())->first();

    $labels_db = Label::where('language_id', $language->id);

    if (is_array($screen_id)) {
        $screens = Screen::whereIn('screen_code', $screen_id)->pluck('id')->toArray();

        $labels_db = $labels_db->whereIn('screen_id', $screens)->get();
    } elseif (is_string($screen_id)) {
        $screen = Screen::where('screen_code', $screen_id)->first();

        $labels_db = $labels_db->where('screen_id', $screen->id)->get();
    }

    if ($labels_db != null) {
        foreach ($labels_db as $label_db) {
            if (!empty($label_db->label_text_override)) {
                $labels[$label_db->label_id] = $label_db->label_text_override;
            } else if (!empty($label_db->label_text_automated)) {
                $labels[$label_db->label_id] = $label_db->label_text_automated;
            } else {
                $labels[$label_db->label_id] = empty($label_db->label_text_en) ? '' : $label_db->label_text_en;
            }
        }
    }

    return $labels;
}


////////////////////
///
// Timezeone needs to be set
$dateTime = date("Y:m:d-H:i:s");
function getDateTime()
{
    global $dateTime;
    return $dateTime;
}


function getCartId()
{

    $id = Cookie::get('cart_id');
    if (!$id) {
        $id = Str::uuid();
        Cookie::queue('cart_id', $id, 60 * 24 * 30,);
    }

    return $id;
}


if (!function_exists("create_image2")) {
    function create_image2($image, array $params = array()): string
    {
        $image_path = '';
        $prefix_folder = 'uploads/';

        if ($image)
            $path = is_string($image) ? $image : $image->path;
        else{
            $image=  $path =  "uploads/img_1.png";
//           $image =   "images/image_1.png" ;
        }


        $basePath1 = trim(str_replace(url('/') . '/', "", $path));


        try {
            $original_path_temp = $original_path = is_string($image) ? $image : $image->getRawOriginal('path');
            $original_path_temp_ext = explode('.',$original_path_temp,2)[0] .'.webp';

            $original_path = Str::contains($original_path, $prefix_folder) ?
                $original_path : $prefix_folder . $original_path;


//            dd($original_path);
            $original_path_new_ext =  explode('.',$original_path,2)[0] .'.webp';


            $image_path = get_image_path($original_path_new_ext, $params);
            $image_path_base = str_replace(url('/').'/','',$image_path);

            if (file_exists($image_path_base))return$image_path ;

            $toCrop = \Intervention\Image\Facades\Image::make(public_path($basePath1))
                ->save($original_path_new_ext);

            $basePath2 = (str_replace($toCrop->basename, "", $original_path_new_ext));
//            $basePath2 = (str_replace($toCrop->basename, "", $original_path_temp));
            $basePath = trim(str_replace(url('/') . '/', "", $basePath2));
//            $basePath = trim(str_replace($original_path_new_ext, "", $basePath3));
            $croppedPath = generate_image_path($basePath, $params);

            $croppedPath = !empty($croppedPath)? $croppedPath:'uploads';

            //dd($croppedPath);




            if (!file_exists($croppedPath)) {
                mkdir($croppedPath, 0777, true);
            }


            if (!file_exists($prefix_folder . $croppedPath . $toCrop->basename)) {
                $toCrop->resize(isset($params['width']) ? $params['width'] : 500, isset($params['height']) ? $params['height'] : 500);

                $toCrop->save($croppedPath . $toCrop->basename);
            }

            //            $original_path_temp =   count(explode('/',$original_path_temp))>1 ? $original_path_temp :"uploads/$original_path_temp";
//            dd($original_path_temp);
//            $image_path = get_image_path($original_path_new_ext, $params);
//            $image_path = get_image_path($original_path_temp, $params);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $image_path = '';
//              dd($ex->getMessage());
//              dd($image->path,$croppedPath);
        }


        return $image_path;
    }

}


