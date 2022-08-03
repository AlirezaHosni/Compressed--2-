<?php

//{"Id":17,"UserName":"mahmoud_rastpour",
//    "Password":"0532faaf080af086e6613a76bd6acf4464102884b2a1a68b5a45e50c51ce68a0",
//    "IsActive":true,"MobileNumber":"09179351778","Email":"m.rastpour@gmail.com",
//    "ActiveCode":"525786","ActiveCodeGuid":"6b1c3b5dd1e34e68a0ceccf7e2da5e",
//    "ConfirmMobileNumber":false,"ConfirmEmail":true,"Role_Id":2,
//    "CreatedDate":"2021-12-22T22:37:31.647",
//    "CreatedBy":-1,"UpdatedDate":"2021-12-22T22:37:31.647",
//    "UpdatedBy":-1,"DeletedDate":null,"DeletedBy":null,
//    "IsDeleted":false,"Analyzer":true,"PreMobileNumber":"0098"}



$filename = "Export-2022-7-29-17-15-27.json";

// Read the JSON file in PHP
$data = file_get_contents(asset($filename));

// Convert the JSON String into PHP Array
$array = json_decode($data, true);
$success = 0;

// dd($array);
// dd($array['UserInfo']);
//$articleGroups = $array['ArticleGroupArticles'];
//$tags = $array['Tag'];
//$tagArticles = $array['TagArticles'];
foreach($array['MenuLinks'] as $items){

//   $data =   new App\Menu;
//   dd(array_keys($items), $items);
    $create = [];
    // dd($items['Id']);
    // foreach($items as $key => $value){
    //     dump($key);
    // }
    foreach($items as $key => $value){
        // dd($item);
        $key_parts = explode('_', $key);
        foreach($key_parts as $key=>$key_part){
        $key_parts[$key] = lcfirst($key_part);
        }
        $final_key = implode('_', $key_parts);
        $final_key = str_replace('iD', 'id', $final_key);
        $create[$final_key] = $value;
        // dump($final_key);
        $create['tag'] = '';
        if($final_key == 'menuLinkType_id')
            $create['article_Group_id'] = $value;
        if($final_key == 'createdDate')
            $create['publishDate'] = $value;
        if($final_key == 'title2')
            $create['titleTwo'] = $value;
        if($final_key == 'writer_id')
            $create['user_id'] = $value;
        if($final_key == 'content')
            $create['mainContent'] = $value;
        if($final_key == 'userAccount_id')
            $create['user_id'] = $value;
        if($final_key == 'name')
            $create['fullName'] = $value;
        if($final_key == 'menuLinkType_id')
            $create['subMenu_id'] = $value;
        if($final_key == 'text')
            $create['comment'] = $value;
        if($final_key == 'isShow')
            $create['active'] = $value;
        if($final_key == 'fileName')
            $create['file'] = $value;
        if($final_key == 'imageName')
            $create['imageFile'] = $value;
        if($final_key == 'userName')
            $create['name'] = $value;
        if($final_key == 'isActive')
            $create['active'] = $value;
        if($final_key == 'mobileNumber')
            $create['phone'] = $value;
        if($final_key == 'mobileNumber')
            $create['phoneNumber'] = $value;
        // $create['tag'] = '';
        // $a = '';
        // $article = new App\Article;
        if($final_key == 'id'){
            // dump($value);
        foreach($tagArticles as $tagArticle){
            // dd($tagArticle['Article_Id'] == $value + 1);
            // if(2 == $value)
            // dd(2 == $value);

            if($tagArticle['Article_Id'] == $value){
                // dd($tagArticle['Article_Id'], $value);
                foreach($tags as $tag){
                    if($tagArticle['Tag_Id'] == $tag['Id']){
                        // dd($tagArticle['Article_Id'], $value, $tagArticle['Tag_Id']);
                        $create['tag'] = $create['tag'] . ',' . $tag['Title'];
                        // dump($create['tag'], $tag['Title']);
                    }
                    // dump($create['tag']);
                }
            }
            // dump($create['tag']);
        }
            // dump($create['tag']);

            // $article->tag = $create['tag'];
            // dump($a);
        }
        // dump($article->tag);
        // $create['tag'] = $a;
        // dump($create['tag']);
        if($final_key == 'id'){
            // dump($value);
            // if($value == 42 or $value == 160 or $value == 175 or $value == 176 or $value == 181 or $value == 208 or $value == 217 or $value == 246 or $value == 274)
            //     continue 1;
            $success = 0;
        foreach($articleGroups as $articleGroup){
            if($articleGroup['Article_Id'] == $value){
                // dd($value, $articleGroup['Article_Id']);
                $create['article_Group_id'] = $articleGroup['Article_Group_Id'];
                $success = 1;
                break;
            }
        }

        }
        // dump($final_key);
            if($final_key == 'uri')
            // dd($value);
              $create['url'] = $value;
        // if($final_key == 'id'){
        // foreach($array['UserInfo'] as $userInfo){
        //     if($userInfo['Id'] == $value){
        //         $create['image'] = $userInfo['ImageName'];
        //         $create['nationalCode'] = $userInfo['NationalCode'];
        //     }
        // }}
    }
        // dd($create);
        // dump($success);
        // dump($create['tag']);
        $create['tag'] = substr($create['tag'], 0, strlen($create['tag'])-1);
        // dump($create['tag']);
    // dd($create);
    // $create['subMenu_id'] = $item[''];
    // $create['subMenu_id'] = $item['menuLinkType_ID'];
    // $create['subMenu_id'] = $item['menuLinkType_ID'];
    // $create['subMenu_id'] = $item['menuLinkType_ID'];
    // $create['subMenu_id'] = $item['menuLinkType_ID'];
    // $create['subMenu_id'] = $item['menuLinkType_ID'];

        if($success == 0)
            continue;
        $success = 0;
    App\Menu::create($create);
}

 $articles = App\Article::all();
 foreach($articles as $article) {
     $create['tag'] = '';
     // dump($value);
     foreach ($tagArticles as $tagArticle) {
         // dd($tagArticle['Article_Id'] == $value + 1);
         // if(2 == $value)
//              dd(2 == $value);

         if ($tagArticle['Article_Id'] == $article->id) {
             // dd($tagArticle['Article_Id'], $value);
             foreach ($tags as $tag) {
                 if ($tagArticle['Tag_Id'] == $tag['Id']) {
                     // dd($tagArticle['Article_Id'], $value, $tagArticle['Tag_Id']);
                     $create['tag'] = $create['tag'] . ',' . $tag['Title'];
                     // dump($create['tag'], $tag['Title']);
                 }
                 // dump($create['tag']);
             }
         }
         // dump($create['tag']);
     }
     // dump($create['tag']);
     $create['tag'] = substr($create['tag'], 0, strlen($create['tag']) - 1);

     $article->tag = $create['tag'];
     $article->save();
     // dump($a);

     foreach ($articles as $article) {
         // dd($article->tag);
         $article->url = ltrim($article->url, 'https://proskillsnews.com');
         $article->save();
         str_starts_with();
     }


 }
