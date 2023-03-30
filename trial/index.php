<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
.container{
  margin-top:20px;
  width:75%;
}
.title{
  margin-top:20px;
  margin-bottom: 20px;
}
.single-news{
  background-color:#ddd;
  padding:30px;
  margin-bottom:20px;
  margin-top:20px;
}
</style>
<div class="container">

      
    
  <h1 class="title text-center">Free News API</h1>
  <hr>
  <div class="list-wrapper">
    <?php
      use jcobhams\NewsApi\NewsApi;

      $newsapi = new NewsApi('14752f907dba4fa09868548074054773');
      
      # /v2/everything
      $all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by,  $page_size, $page);
       
        ?>
     
      <div class="row single-news">
        <div class="col-4">
          <img style="width:100%;" src="<?php echo $news->urlToImage;?>">
        </div>
        <div class="col-8">
          <h2><?php echo $news->title;?></h2>
          <small><?php echo $news->source->name;?></small>
          <?php if($news->author && $news->author!=''){ ?>
            <small>| <?php echo $news->author;?></small>
          <?php } ?>
          <p><?php echo $news->description;?></p>
          <a href="<?php echo $news->url;?>" class="btn btn-sm btn-primary" style="float:right;" target="_blank">Read More >></a>
        </div>
      </div>
 
  </div>
</div>