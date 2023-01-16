<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSetting;
use App\Models\ArticleSetting;
use App\Models\CounterBoxSetting;
use App\Models\EventsSetting;
use App\Models\FeaturesSetting;
use App\Models\FeedbacksSetting;
use App\Models\GeneralSetting;
use App\Models\HeroSetting;
use App\Models\LandingAboutUs;
use App\Models\LandingAppdesign;
use App\Models\LandingContactUs;
use App\Models\LandingSeo;
use App\Models\LandingWebdesign;
use App\Models\PortfoliosSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function general(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = GeneralSetting::where('locale',$locale)->first();
        return view('admin.views.settings.general',compact('settings'));
    }

    public function hero(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = HeroSetting::where('locale',$locale)->first();
        return view('admin.views.settings.hero',compact('settings'));
    }

    public function about(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = AboutSetting::where('locale',$locale)->first();
        return view('admin.views.settings.about',compact('settings'));
    }

    public function features(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = FeaturesSetting::where('locale',$locale)->first();
        return view('admin.views.settings.features',compact('settings'));
    }

    public function portfolios(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = PortfoliosSetting::where('locale',$locale)->first();
        return view('admin.views.settings.portfolios',compact('settings'));
    }

    public function articles(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = ArticleSetting::where('locale',$locale)->first();
        return view('admin.views.settings.articles',compact('settings'));
    }

    public function counters(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = CounterBoxSetting::where('locale',$locale)->first();
        return view('admin.views.settings.counters',compact('settings'));
    }

    public function events(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = EventsSetting::where('locale',$locale)->first();
        return view('admin.views.settings.events',compact('settings'));
    }

    public function feedbacks(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = FeedbacksSetting::where('locale',$locale)->first();
        return view('admin.views.settings.feedbacks',compact('settings'));
    }

    public function contactUs(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = LandingContactUs::where('locale',$locale)->first();
        return view('admin.views.settings.contact_us',compact('settings'));
    }

    public function aboutUs(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = LandingAboutUs::where('locale',$locale)->first();
        return view('admin.views.settings.about_us',compact('settings'));
    }

    public function seo(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = LandingSeo::where('locale',$locale)->first();
        return view('admin.views.settings.seo',compact('settings'));
    }

    public function webDesign(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = LandingWebdesign::where('locale',$locale)->first();
        return view('admin.views.settings.web_design',compact('settings'));
    }

    public function appDesign(){
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';
        $settings = LandingAppdesign::where('locale',$locale)->first();
        return view('admin.views.settings.app_design',compact('settings'));
    }


    public function updateGeneral(Request $request){
        $request->validate([
            'header_address' => 'nullable|string|max:255',
            'header_email' => 'nullable|string|max:255',
            'header_btn_link' => 'nullable|string|max:255',
            'header_btn_text' => 'nullable|string|max:255',
            'header_btn_icon' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'header_logo' => 'nullable|mimes:jpeg,jpg,png,gif',
            'footer_logo' => 'nullable|mimes:jpeg,jpg,png,gif',
            'footer_under_logo_text' => 'nullable|string|max:255',
            'footer_list1_title' => 'nullable|string|max:255',
            'footer_list2_title' => 'nullable|string|max:255',
            'footer_list3_title' => 'nullable|string|max:255',
            'footer_phone' => 'nullable|string|max:255',
            'footer_email' => 'nullable|string|max:255',
            'footer_address' => 'nullable|string|max:255',
            'footer_copyright' => 'nullable|string|max:1024',
            'footer_box_small_text' => 'nullable|string|max:255',
            'footer_box_large_text' => 'nullable|string|max:255',
            'footer_box_btn_text' => 'nullable|string|max:255',
            'footer_box_btn_icon' => 'nullable|string|max:255',
            'footer_box_btn_link' => 'nullable|string|max:255',
            'footer_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'popup_title' => 'nullable|string|max:255',
            'popup_description' => 'nullable|string|max:512',
            'popup_image' => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // header logo
        if ($request->remove_header_logo != null) {
            $fileUrl = request('remove_header_logo');
            $this->removeStorageFile($fileUrl);
            $inputs['header_logo'] = null;
        }
        if ($request->hasFile('header_logo')) {
            $imageFile = $request->file('header_logo');
            $inputs['header_logo'] = $this->uploadRealFile($imageFile,'settings');
        }

        // header mobile logo
        if ($request->remove_header_mobile_logo != null) {
            $fileUrl = request('remove_header_mobile_logo');
            $this->removeStorageFile($fileUrl);
            $inputs['header_mobile_logo'] = null;
        }
        if ($request->hasFile('header_mobile_logo')) {
            $imageFile = $request->file('header_mobile_logo');
            $inputs['header_mobile_logo'] = $this->uploadRealFile($imageFile,'settings');
        }

        // footer logo
        if ($request->remove_footer_logo != null) {
            $fileUrl = request('remove_footer_logo');
            $this->removeStorageFile($fileUrl);
            $inputs['footer_logo'] = null;
        }
        if ($request->hasFile('footer_logo')) {
            $imageFile = $request->file('footer_logo');
            $inputs['footer_logo'] = $this->uploadRealFile($imageFile,'settings');
        }

        // footer image
        if ($request->remove_footer_image != null) {
            $fileUrl = request('remove_footer_image');
            $this->removeStorageFile($fileUrl);
            $inputs['footer_image'] = null;
        }
        if ($request->hasFile('footer_image')) {
            $imageFile = $request->file('footer_image');
            $inputs['footer_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        // popup image
        if ($request->remove_popup_image != null) {
            $fileUrl = request('remove_popup_image');
            $this->removeStorageFile($fileUrl);
            $inputs['popup_image'] = null;
        }
        if ($request->hasFile('popup_image')) {
            $imageFile = $request->file('popup_image');
            $inputs['popup_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        $settings= GeneralSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateHero(Request $request){
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'hero_btn_text'  => 'nullable|string|max:255',
            'hero_btn_icon'  => 'nullable|string|max:255',
            'hero_btn_link'  => 'nullable|string|max:255',
            'hero_play_video_link'  => 'nullable|string|max:255',
            'hero_box_title'  => 'nullable|string|max:255',
            'hero_box_text'  => 'nullable|string|max:255',
            'hero_box_btn_text'  => 'nullable|string|max:255',
            'hero_box_btn_icon'  => 'nullable|string|max:255',
            'hero_box_btn_link'  => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // image
        if ($request->remove_hero_image != null) {
            $fileUrl = request('remove_hero_image');
            $this->removeStorageFile($fileUrl);
            $inputs['hero_image'] = null;
        }
        if ($request->hasFile('hero_image')) {
            $imageFile = $request->file('hero_image');
            $inputs['hero_image'] = $this->uploadRealFile($imageFile,'settings');
        }
        $settings= HeroSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateAbout(Request $request){
        $request->validate([
            'about_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'about_video_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'about_video_link' => 'nullable|string|max:255',
            'about_uptitle' => 'nullable|string|max:255',
            'about_title' => 'nullable|string|max:255',
            'about_text' => 'nullable|string|max:512',
            'about_btn_text' => 'nullable|string|max:255',
            'about_btn_icon' => 'nullable|string|max:255',
            'about_btn_link' => 'nullable|string|max:255',
            'about_item1_title' => 'nullable|string|max:255',
            'about_item1_text' => 'nullable|string|max:255',
            'about_item2_title' => 'nullable|string|max:255',
            'about_item2_text' => 'nullable|string|max:255',
            'about_item3_title' => 'nullable|string|max:255',
            'about_item3_text' => 'nullable|string|max:255',
            'about2_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'about2_uptitle' => 'nullable|string|max:255',
            'about2_title' => 'nullable|string|max:255',
            'about2_text' => 'nullable|string|max:512',
            'about2_btn_text' => 'nullable|string|max:255',
            'about2_btn_icon' => 'nullable|string|max:255',
            'about2_btn_link' => 'nullable|string|max:255',
            'about2_item1_title' => 'nullable|string|max:255',
            'about2_item1_text' => 'nullable|string|max:255',
            'about2_item2_title' => 'nullable|string|max:255',
            'about2_item2_text' => 'nullable|string|max:255',
            'about2_item3_title' => 'nullable|string|max:255',
            'about2_item3_text' => 'nullable|string|max:255',
            'about3_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'about3_uptitle' => 'nullable|string|max:255',
            'about3_title' => 'nullable|string|max:255',
            'about3_text' => 'nullable|string|max:512',
            'about3_btn_text' => 'nullable|string|max:255',
            'about3_btn_icon' => 'nullable|string|max:255',
            'about3_btn_link' => 'nullable|string|max:255',
            'about3_item1_title' => 'nullable|string|max:255',
            'about3_item1_text' => 'nullable|string|max:255',
            'about3_item2_title' => 'nullable|string|max:255',
            'about3_item2_text' => 'nullable|string|max:255',
            'about3_item3_title' => 'nullable|string|max:255',
            'about3_item3_text' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // image
        if ($request->remove_about_image != null) {
            $fileUrl = request('remove_about_image');
            $this->removeStorageFile($fileUrl);
            $inputs['about_image'] = null;
        }
        if ($request->hasFile('about_image')) {
            $imageFile = $request->file('about_image');
            $inputs['about_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        // image 2
        if ($request->remove_about2_image != null) {
            $fileUrl = request('remove_about2_image');
            $this->removeStorageFile($fileUrl);
            $inputs['about2_image'] = null;
        }
        if ($request->hasFile('about2_image')) {
            $imageFile = $request->file('about2_image');
            $inputs['about2_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        // image 3
        if ($request->remove_about3_image != null) {
            $fileUrl = request('remove_about3_image');
            $this->removeStorageFile($fileUrl);
            $inputs['about3_image'] = null;
        }
        if ($request->hasFile('about3_image')) {
            $imageFile = $request->file('about3_image');
            $inputs['about3_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        // video image
        if ($request->remove_about_video_image != null) {
            $fileUrl = request('remove_about_video_image');
            $this->removeStorageFile($fileUrl);
            $inputs['about_video_image'] = null;
        }
        if ($request->hasFile('about_video_image')) {
            $imageFile = $request->file('about_video_image');
            $inputs['about_video_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        $settings= AboutSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateFeatures(Request $request){
        $request->validate([
            'features_uptitle' => 'nullable|string|max:255',
            'features_title' => 'nullable|string|max:255',
            'features_video_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'features_video_link' => 'nullable|string|max:255',
            'features_item1_title' => 'nullable|string|max:255',
            'features_item1_text' => 'nullable|string|max:255',
            'features_item1_icon' => 'nullable|string|max:255',
            'features_item2_title' => 'nullable|string|max:255',
            'features_item2_text' => 'nullable|string|max:255',
            'features_item2_icon' => 'nullable|string|max:255',
            'features_item3_title' => 'nullable|string|max:255',
            'features_item3_text' => 'nullable|string|max:255',
            'features_item3_icon' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // video image
        if ($request->remove_features_video_image != null) {
            $fileUrl = request('remove_features_video_image');
            $this->removeStorageFile($fileUrl);
            $inputs['features_video_image'] = null;
        }
        if ($request->hasFile('features_video_image')) {
            $imageFile = $request->file('features_video_image');
            $inputs['features_video_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        $settings= FeaturesSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updatePortfolios(Request $request){
        $request->validate([
            'portfolios_uptitle' => 'nullable|string|max:255',
            'portfolios_title' => 'nullable|string|max:255',
            'portfolios_count' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        $settings= PortfoliosSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateArticles(Request $request){
        $request->validate([
            'articles_uptitle' => 'nullable|string|max:255',
            'articles_title' => 'nullable|string|max:255',
            'articles_count' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        $settings= ArticleSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateCounters(Request $request){
        $request->validate([
            'counter_box1_icon' =>  'nullable|string|max:255',
            'counter_box1_number' =>  'nullable|string|max:255',
            'counter_box1_title' =>  'nullable|string|max:255',
            'counter_box1_text' =>  'nullable|string|max:255',
            'counter_box2_icon' =>  'nullable|string|max:255',
            'counter_box2_number' =>  'nullable|string|max:255',
            'counter_box2_title' =>  'nullable|string|max:255',
            'counter_box2_text' =>  'nullable|string|max:255',
            'counter_box3_icon' =>  'nullable|string|max:255',
            'counter_box3_number' =>  'nullable|string|max:255',
            'counter_box3_title' =>  'nullable|string|max:255',
            'counter_box3_text' =>  'nullable|string|max:255',
            'counter_box4_icon' =>  'nullable|string|max:255',
            'counter_box4_number' =>  'nullable|string|max:255',
            'counter_box4_title' =>  'nullable|string|max:255',
            'counter_box4_text' =>  'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        $settings= CounterBoxSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateEvents(Request $request){
        $request->validate([
            'event1_title' =>  'nullable|string|max:255',
            'event1_text' =>  'nullable|string|max:255',
            'event1_image' =>  'nullable|mimes:jpeg,jpg,png,gif',
            'event1_btn_text' =>  'nullable|string|max:255',
            'event1_box_btn_icon' =>  'nullable|string|max:255',
            'event1_box_btn_link' =>  'nullable|string|max:255',
            'event2_title' =>  'nullable|string|max:255',
            'event2_text' =>  'nullable|string|max:255',
            'event2_image' =>  'nullable|mimes:jpeg,jpg,png,gif',
            'event2_btn_text' =>  'nullable|string|max:255',
            'event2_box_btn_icon' =>  'nullable|string|max:255',
            'event2_box_btn_link' =>  'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // event1 image
        if ($request->remove_event1_image != null) {
            $fileUrl = request('remove_event1_image');
            $this->removeStorageFile($fileUrl);
            $inputs['event1_image'] = null;
        }
        if ($request->hasFile('event1_image')) {
            $imageFile = $request->file('event1_image');
            $inputs['event1_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        // event2 image
        if ($request->remove_event2_image != null) {
            $fileUrl = request('remove_event2_image');
            $this->removeStorageFile($fileUrl);
            $inputs['event2_image'] = null;
        }
        if ($request->hasFile('event2_image')) {
            $imageFile = $request->file('event2_image');
            $inputs['event2_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        $settings= EventsSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateFeedbacks(Request $request){
        $request->validate([
            'feedbacks_uptitle' => 'nullable|string|max:255',
            'feedbacks_title' => 'nullable|string|max:255',
            'feedbacks_count' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();

        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        $settings= FeedbacksSetting::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateContactUs(Request $request){
        $request->validate([

            'page_title' => 'nullable|string|max:255',
            'uptitle' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1024',
            'address' => 'nullable|string|max:255',
            'support' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'map' => 'nullable|string|max:1024',
            'form_title' => 'nullable|string|max:255',
            'form_description' => 'nullable|string|max:512',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';


        $settings= LandingContactUs::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateAboutUs(Request $request){
        $request->validate([
            'page_title' => 'nullable|string|max:255',
            'uptitle' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:512',
            'items' => 'nullable|string|max:512',
            'image'  =>  'nullable|mimes:jpeg,jpg,png,gif',
            'features_uptitle' => 'nullable|string|max:255',
            'features_title' => 'nullable|string|max:255',
            'features_box1_icon' => 'nullable|string|max:255',
            'features_box1_title' => 'nullable|string|max:255',
            'features_box1_text' => 'nullable|string|max:255',
            'features_box2_icon' => 'nullable|string|max:255',
            'features_box2_title' => 'nullable|string|max:255',
            'features_box2_text' => 'nullable|string|max:255',
            'features_box3_icon' => 'nullable|string|max:255',
            'features_box3_title' => 'nullable|string|max:255',
            'features_box3_text' => 'nullable|string|max:255',
            'team_uptitle' => 'nullable|string|max:255',
            'team_title' => 'nullable|string|max:255',
            'feedback_uptitle' => 'nullable|string|max:255',
            'feedback_title' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // image
        if ($request->remove_image != null) {
            $fileUrl = request('remove_image');
            $this->removeStorageFile($fileUrl);
            $inputs['image'] = null;
        }
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $inputs['image'] = $this->uploadRealFile($imageFile,'settings');
        }

        $settings= LandingAboutUs::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function updateSeo(Request $request){
        $request->validate([
            'nav_title' => 'required|string|max:255',
            'cta_image'  =>  'nullable|mimes:jpeg,jpg,png,gif',
            'cta_uptitle' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:2048',
            'cta_btn1_text' => 'nullable|string|max:255',
            'cta_btn1_icon' => 'nullable|string|max:255',
            'cta_btn1_link' => 'nullable|string|max:255',
            'cta_btn2_text' => 'nullable|string|max:255',
            'cta_btn2_icon' => 'nullable|string|max:255',
            'cta_btn2_link' => 'nullable|string|max:255',
            'video'   =>  'nullable|mimes:mp4,mov,ogg,qt|max:50000',
            'video_poster' => 'nullable|mimes:jpeg,jpg,png,gif',
            'faq_title' => 'nullable|string|max:255',
            'faq',
            'summary' => 'nullable|string|max:1024',
            'article_btn_text' => 'nullable|string|max:255',
            'article_btn_icon' => 'nullable|string|max:255',
            'article_btn_link' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // faq
        $faq = array();
        foreach ($inputs as $key => $input) {
            if (str_starts_with($key, 'item_faq_')) {
                array_push($faq,$input);
            }
        }
        $inputs['faq'] = $faq;

        // cta image
        if ($request->remove_cta_image != null) {
            $fileUrl = request('remove_cta_image');
            $this->removeStorageFile($fileUrl);
            $inputs['cta_image'] = null;
        }
        if ($request->hasFile('cta_image')) {
            $imageFile = $request->file('cta_image');
            $inputs['cta_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        // video poster
        if ($request->remove_video_poster != null) {
            $fileUrl = request('remove_video_poster');
            $this->removeStorageFile($fileUrl);
            $inputs['video_poster'] = null;
        }
        if ($request->hasFile('video_poster')) {
            $imageFile = $request->file('video_poster');
            $inputs['video_poster'] = $this->uploadRealFile($imageFile,'settings');
        }

        // upload video
        if ($request->remove_video != null) {
            $fileUrl = request('remove_video');
            $this->removeStorageFile($fileUrl);
            $inputs['video'] = null;
        }
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $inputs['video'] = $this->uploadRealFile($videoFile,'settings');
        }

        $settings= LandingSeo::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function webDesignUpdate(Request $request){
        $request->validate([
            'nav_title' => 'required|string|max:255',
            'cta_image'  =>  'nullable|mimes:jpeg,jpg,png,gif',
            'cta_uptitle' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:2048',
            'cta_btn1_text' => 'nullable|string|max:255',
            'cta_btn1_icon' => 'nullable|string|max:255',
            'cta_btn1_link' => 'nullable|string|max:255',
            'cta_btn2_text' => 'nullable|string|max:255',
            'cta_btn2_icon' => 'nullable|string|max:255',
            'cta_btn2_link' => 'nullable|string|max:255',
            'video'   =>  'nullable|mimes:mp4,mov,ogg,qt|max:50000',
            'video_poster' => 'nullable|mimes:jpeg,jpg,png,gif',
            'faq_title' => 'nullable|string|max:255',
            'faq',
            'summary' => 'nullable|string|max:1024',
            'article_btn_text' => 'nullable|string|max:255',
            'article_btn_icon' => 'nullable|string|max:255',
            'article_btn_link' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // faq
        $faq = array();
        foreach ($inputs as $key => $input) {
            if (str_starts_with($key, 'item_faq_')) {
                array_push($faq,$input);
            }
        }
        $inputs['faq'] = $faq;

        // cta image
        if ($request->remove_cta_image != null) {
            $fileUrl = request('remove_cta_image');
            $this->removeStorageFile($fileUrl);
            $inputs['cta_image'] = null;
        }
        if ($request->hasFile('cta_image')) {
            $imageFile = $request->file('cta_image');
            $inputs['cta_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        // video poster
        if ($request->remove_video_poster != null) {
            $fileUrl = request('remove_video_poster');
            $this->removeStorageFile($fileUrl);
            $inputs['video_poster'] = null;
        }
        if ($request->hasFile('video_poster')) {
            $imageFile = $request->file('video_poster');
            $inputs['video_poster'] = $this->uploadRealFile($imageFile,'settings');
        }

        // upload video
        if ($request->remove_video != null) {
            $fileUrl = request('remove_video');
            $this->removeStorageFile($fileUrl);
            $inputs['video'] = null;
        }
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $inputs['video'] = $this->uploadRealFile($videoFile,'settings');
        }

        $settings= LandingWebdesign::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }

    public function appDesignUpdate(Request $request){
        $request->validate([
            'nav_title' => 'required|string|max:255',
            'cta_image'  =>  'nullable|mimes:jpeg,jpg,png,gif',
            'cta_uptitle' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:2048',
            'cta_btn1_text' => 'nullable|string|max:255',
            'cta_btn1_icon' => 'nullable|string|max:255',
            'cta_btn1_link' => 'nullable|string|max:255',
            'cta_btn2_text' => 'nullable|string|max:255',
            'cta_btn2_icon' => 'nullable|string|max:255',
            'cta_btn2_link' => 'nullable|string|max:255',
            'video'   =>  'nullable|mimes:mp4,mov,ogg,qt|max:50000',
            'video_poster' => 'nullable|mimes:jpeg,jpg,png,gif',
            'faq_title' => 'nullable|string|max:255',
            'faq',
            'summary' => 'nullable|string|max:1024',
            'article_btn_text' => 'nullable|string|max:255',
            'article_btn_icon' => 'nullable|string|max:255',
            'article_btn_link' => 'nullable|string|max:255',
        ]);
        $inputs = request()->all();
        if (session()->has('locale')) $locale = session('locale'); else $locale = 'fa';

        // faq
        $faq = array();
        foreach ($inputs as $key => $input) {
            if (str_starts_with($key, 'item_faq_')) {
                array_push($faq,$input);
            }
        }
        $inputs['faq'] = $faq;

        // cta image
        if ($request->remove_cta_image != null) {
            $fileUrl = request('remove_cta_image');
            $this->removeStorageFile($fileUrl);
            $inputs['cta_image'] = null;
        }
        if ($request->hasFile('cta_image')) {
            $imageFile = $request->file('cta_image');
            $inputs['cta_image'] = $this->uploadRealFile($imageFile,'settings');
        }

        // video poster
        if ($request->remove_video_poster != null) {
            $fileUrl = request('remove_video_poster');
            $this->removeStorageFile($fileUrl);
            $inputs['video_poster'] = null;
        }
        if ($request->hasFile('video_poster')) {
            $imageFile = $request->file('video_poster');
            $inputs['video_poster'] = $this->uploadRealFile($imageFile,'settings');
        }

        // upload video
        if ($request->remove_video != null) {
            $fileUrl = request('remove_video');
            $this->removeStorageFile($fileUrl);
            $inputs['video'] = null;
        }
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $inputs['video'] = $this->uploadRealFile($videoFile,'settings');
        }

        $settings= LandingAppdesign::where('locale',$locale)->first();
        $settings->update($inputs);
        session()->flash('success','تغییرات با موفقیت ذخیره شد.');
        return redirect()->back();
    }


}
