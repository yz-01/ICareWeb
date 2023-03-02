<?php

namespace App\Facade;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class UploadImage
{
    public static function uploadStudentImage($request, $student,$i)
    {
        $file_name = $student->id;  // File name using user id;
        $branch_id = $student->branch_id;
        $image   = $request->file('student_image_'.$i);
//        dd($image);
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/student/avatars/".$fileName, $img);
        $file = "storage/" . $branch_id . "/student/avatars/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadAdminImage($request, $admin)
    {
        $file_name = $admin->id;  // File name using user id;
        $image   = $request->file('image');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put("/admin/avatars/".$fileName, $img);
        $file = "storage/admin/avatars/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadGuardianImage($request, $guardian)
    {
        $file_name = $guardian->id;  // File name using user id;
        $branch_id = $guardian->branch_id;
        $image   = $request->file('image');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/guardian/avatars/".$fileName, $img);
        $file = "storage/" . $branch_id . "/guardian/avatars/" . $fileName;   // Get path to access image
        
        return $file;
    }

    public static function uploadTeacherImage($request, $teacher)
    {
        $file_name = $teacher->id;  // File name using user id;
        $branch_id = $teacher->branch_id;
        $image   = $request->file('image');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/teacher/avatars/".$fileName, $img);
        $file = "storage/" . $branch_id . "/teacher/avatars/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadAdminProfileImage($request)
    {
        $file_name = auth()->user()->id;  // File name using user id;
        $image   = $request->file('image');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put("/admin/avatars/".$fileName, $img);
        $file = "storage/admin/avatars/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadGuardianProfileImage($request)
    {
        $file_name = auth()->user()->id;  // File name using user id;
        $branch_id = auth()->user()->branch->id;
        $image   = $request->file('image');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/guardian/avatars/".$fileName, $img);
        $file = "storage/" . $branch_id . "/guardian/avatars/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadTeacherProfileImage($request)
    {
        $file_name = auth()->user()->id;  // File name using user id;
        $branch_id = auth()->user()->branch->id;
        $image   = $request->file('image');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/teacher/avatars/".$fileName, $img);
        $file = "storage/" . $branch_id . "/teacher/avatars/" . $fileName;   // Get path to access image

        return $file;
    }

    // public static function uploadLivewireBranchImage($file, $path)
    // {
    //     $url = url('/') . "/storage/" . $file->storeAs($path, date('YmdHis') . "_" . mt_rand() . "." . $file->getClientOriginalExtension(), 'public');
    //     return $url;
    // }

    public static function uploadLivewireBranchUserImage($file,$user,$user_id)
    {
        if($user == 'guardian')
        {
            $file_name = $user_id;  // File name using user id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/guardian/avatars/".$fileName, $img);
            $file = "storage/" . $branch_id . "/guardian/avatars/" . $fileName;   // Get path to access image
        }
        elseif($user == 'staff')
        {
            $file_name = $user_id;  // File name using user id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/branch/avatars/".$fileName, $img);
            $file = "storage/" . $branch_id . "/branch/avatars/" . $fileName;   // Get path to access image
        }
        elseif($user == 'student')
        {
            $file_name = $user_id;  // File name using user id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/student/avatars/".$fileName, $img);
            $file = "storage/" . $branch_id . "/student/avatars/" . $fileName;   // Get path to access image
        }
        elseif($user == 'teacher')
        {
            $file_name = $user_id;  // File name using user id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/teacher/avatars/".$fileName, $img);
            $file = "storage/" . $branch_id . "/teacher/avatars/" . $fileName;   // Get path to access image
        }

        return $file;
    }

    public static function uploadLivewireCourseBanner($file, $platform, $course_id)
    {
        if($platform == 'web') 
        {
            $file_name = $course_id;  // File name using course id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/course/Web/".$fileName, $img);
            $file = "storage/" . $branch_id . "/course/web/" . $fileName;   // Get path to access image
        }
        elseif($platform == 'app')
        {
            $file_name = $course_id;  // File name using course id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/course/App/".$fileName, $img);
            $file = "storage/" . $branch_id . "/course/app/" . $fileName;   // Get path to access image
        }
        
        return $file;
    }

    public static function uploadLivewireLandingImage($file, $type, $landing_cms)
    {
        if($type == 'header_logo') 
        {
            $file_name = $landing_cms->id.'_header';  // File name using landing cms id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put("/landing/logo/".$fileName, $img);
            $file = "storage/landing/logo/" . $fileName;   // Get path to access image
        }
        elseif($type == 'footer_logo') 
        {
            $file_name = $landing_cms->id.'_footer';  // File name using landing cms id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put("/landing/logo/".$fileName, $img);
            $file = "storage/landing/logo/" . $fileName;   // Get path to access image
        }
        elseif($type == 'banner')
        {
            $file_name = $landing_cms->id;  // File name using landing cms id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put("/landing/banner/".$fileName, $img);
            $file = "storage/landing/banner/" . $fileName;   // Get path to access image
        }
        
        return $file;
    }

    public static function uploadLivewireLandingItemImage($file, $section)
    {
        $file_name = Str::random(10);
        $image   = $file;
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put("/landing/section/".$section. "/".$fileName, $img);
        $file = "storage/landing/section/".$section. "/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadLivewireEstudyImage($file, $user, $estudy_question_id)
    {
        if($user == 'admin') 
        {
            $file_name = $estudy_question_id;  // File name using estudy question id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put("admin/estudy_question/".$fileName, $img);
            $file = "storage/admin/estudy_question/" . $fileName;   // Get path to access image
        }
        elseif($user == 'staff')
        {
            $file_name = $estudy_question_id;  // File name using estudy question id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/staff/estudy_question/".$fileName, $img);
            $file = "storage/" . $branch_id . "/staff/estudy_question/" . $fileName;   // Get path to access image
        }
        elseif($user == 'teacher')
        {
            $file_name = $estudy_question_id;  // File name using estudy question id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/teacher/estudy_question/".$fileName, $img);
            $file = "storage/" . $branch_id . "/teacher/estudy_question/" . $fileName;   // Get path to access image
        }
        
        return $file;
    }

    public static function uploadLivewireQuizImage($file, $user, $question_id)
    {
        if($user == 'admin') 
        {
            $file_name = $question_id;  // File name using question id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put("admin/quiz_question/".$fileName, $img);
            $file = "storage/admin/quiz_question/" . $fileName;   // Get path to access image
        }
        elseif($user == 'staff')
        {
            $file_name = $question_id;  // File name using question id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/staff/quiz_question/".$fileName, $img);
            $file = "storage/" . $branch_id . "/staff/quiz_question/" . $fileName;   // Get path to access image
        }
        elseif($user == 'teacher')
        {
            $file_name = $question_id;  // File name using question id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/teacher/quiz_question/".$fileName, $img);
            $file = "storage/" . $branch_id . "/teacher/quiz_question/" . $fileName;   // Get path to access image
        }
        
        return $file;
    }
    
    public static function uploadLivewireProductImage($file, $user, $product)
    {
        if ($user == 'admin') 
        {
            $file_name = Str::random(10);  // File name using user id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put("admin/eshop/products/".$product->id."/".$fileName, $img);
            $file = "storage/admin/eshop/products/" . $product->id . "/" . $fileName;   // Get path to access image
        }
        elseif ($user == 'staff') 
        {
            $file_name = Str::random(10);  // File name using user id;
            $branch_id = auth()->user()->branch->id;
            $image   = $file;
            $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/eshop/products/".$product->id."/".$fileName, $img);
            $file = "storage/" . $branch_id . "/eshop/products/" . $product->id . "/" . $fileName;   // Get path to access image
        }

        return $file;
    }
    
    public static function uploadLivewireNotificationImage($file, $user, $notification)
    {
        if($user == 'staff') 
        {
            $file_name = Str::random(10);  // File name random;
            $branch_id = auth()->user()->branch->id;
            $fileName   = $file_name . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/staff/notifications/".$notification->id."/".$fileName, $img);
            $file = "storage/" . $branch_id . "/staff/notifications/" .$notification->id."/". $fileName;   // Get path to access image
        }
        elseif($user == 'teacher')
        {
            $file_name = Str::random(10);  // File name random;
            $branch_id = auth()->user()->branch->id;
            $fileName   = $file_name . '.' . $file->getClientOriginalExtension();
            $img = Image::make($file->getRealPath());
            $img->stream(); 
            Storage::disk('public')->put($branch_id."/teacher/notifications/".$notification->id."/".$fileName, $img);
            $file = "storage/" . $branch_id . "/teacher/notifications/" .$notification->id."/". $fileName;   // Get path to access image
        }
        return $file;
    }

    public static function uploadBranchImage($request)
    {
        $file_name = auth()->user()->id;  // File name using user id;
        $branch_id = auth()->user()->branch->id;
        $image   = $request->file('image');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/branch/avatars/".$fileName, $img);
        $file = "storage/" . $branch_id . "/branch/avatars/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadBranchLogo($request, $branch)
    {
        $file_name = $branch->id;  // File name using branch id;
        $image   = $request->file('logo');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream();
        Storage::disk('public')->put($branch->id."/logo/".$fileName, $img);
        $file = "storage/" . $branch->id . "/logo/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadBranchThumbnailLogo($request, $branch)
    {
        $file_name = $branch->id;  // File name using branch id;
        $image   = $request->file('logo_sm');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream();
        Storage::disk('public')->put($branch->id."/logo_sm/".$fileName, $img);
        $file = "storage/" . $branch->id . "/logo_sm/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadWebBanner($request, $branch)
    {
        $file_name = $branch->id;  // File name using branch id;
        $image   = $request->file('banner_web');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream();
        Storage::disk('public')->put($branch->id."/banner/web/".$fileName, $img);
        $file = "storage/" . $branch->id . "/banner/web/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadAppBanner($request, $branch)
    {
        $file_name = $branch->id;  // File name using branch id;
        $image   = $request->file('banner_app');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream();
        Storage::disk('public')->put($branch->id."/banner/app/".$fileName, $img);
        $file = "storage/" . $branch->id . "/banner/app/" . $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadGuardianProof($request, $payment)
    {
        $file_name = Str::random(10);  // File name random;
        $branch_id = auth()->user()->branch->id;
        $image   = $request->file('image');
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/payments/".$payment->id."/".$fileName, $img);
        $file = "storage/" . $branch_id . "/payments/".$payment->id."/". $fileName;   // Get path to access image

        return $file;
    }
    
    public static function uploadPostImage($image, $post)
    {
        $file_name = Str::random(10);  // File name random;
        $branch_id = auth()->user()->branch->id;
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/community/posts/".$post->id."/".$fileName, $img);
        $file = "storage/" . $branch_id . "/community/posts/" .$post->id."/". $fileName;   // Get path to access image

        return $file;
    }
    
    public static function uploadAnnouncementImage($image, $announcement)
    {
        $file_name = Str::random(10);  // File name random;
        $branch_id = $announcement->branch_id;
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/admin/announcements/".$announcement->id."/".$fileName, $img);
        $file = "storage/" . $branch_id . "/admin/announcements/" .$announcement->id."/". $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadRoutineBabyReportImage($image, $routine)
    {
        $file_name = Str::random(10);  // File name random;
        $branch_id = $routine->branch_id;
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/admin/routine_baby/".$routine->id."/".$fileName, $img);
        $file = "storage/" . $branch_id . "/admin/routine_baby/" .$routine->id."/". $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadRoutineChildReportImage($image, $routine)
    {
        $file_name = Str::random(10);  // File name random;
        $branch_id = $routine->branch_id;
        $fileName   = $file_name . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/admin/routine_child/".$routine->id."/".$fileName, $img);
        $file = "storage/" . $branch_id . "/admin/routine_child/" .$routine->id."/". $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadRoutineBabyReportVideo($video, $routine)
    {
        $file_name = Str::random(10);  // File name random;
        $branch_id = $routine->branch_id;
        $fileName   = $file_name . '.' . $video->getClientOriginalExtension();
        $img = Image::make($video->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/admin/routine_baby/".$routine->id."/".$fileName, $img);
        $file = "storage/" . $branch_id . "/admin/routine_baby/" .$routine->id."/". $fileName;   // Get path to access image

        return $file;
    }

    public static function uploadRoutineChildReportVideo($video, $routine)
    {
        $file_name = Str::random(10);  // File name random;
        $branch_id = $routine->branch_id;
        $fileName   = $file_name . '.' . $video->getClientOriginalExtension();
        $img = Image::make($video->getRealPath());
        $img->stream(); 
        Storage::disk('public')->put($branch_id."/admin/routine_child/".$routine->id."/".$fileName, $img);
        $file = "storage/" . $branch_id . "/admin/routine_child/" .$routine->id."/". $fileName;   // Get path to access image

        return $file;
    }
}
