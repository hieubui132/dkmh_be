<?php

use Illuminate\Http\Request;
use App\Models\Song;

Route::namespace('API')->name('api.')->group(function(){
   /* 
    Route::middleware('auth:api')->group(function() {
    });*/
    Route::get("rooms",'APIController@getListRom')->name('api_admin_rooms');
    Route::get("subjects",'APIController@getListSubject')->name('api_admin_subjects');
    Route::get("teachers",'APIController@getListTeacher')->name('api_admin_teachers');
    Route::post("add-register",'APIController@postResgist')->name('api_admin_regist_add');
    Route::delete("delete-register",'APIController@deleteRegist')->name('api_admin_regist_delete');
    Route::put("update-register",'APIController@putRegist')->name('api_admin_regist_update');
    Route::get("download-class",'APIController@downloadClasss')->name('api_admin_download_class');
    Route::get("list-by-teacher",'APIController@getResultByTeacher')->name('api_admin_list_by_teacher');
    Route::get("list-by-subject",'APIController@getResultBySubject')->name('api_admin_list_by_subject');
    Route::get("list-by-class",'APIController@getResultRegistClass')->name('api_admin_list_by_class');
    Route::post("upload",'APIController@importCSV')->name('api_admin_import_csv');
    Route::get("download-class/all",'APIController@downloadAllClass')->name('api_admin_download_all');

    Route::post("add-student-register",'APIController@postStudentResgist')->name('api_admin_student_regist_add');
    Route::delete("delete-student-register",'APIController@deleteStudentRegist')->name('api_admin_student_regist_delete');
    Route::put("update-student-register",'APIController@putStudentRegist')->name('api_admin_student_regist_update');
});



