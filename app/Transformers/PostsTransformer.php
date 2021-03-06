<?php namespace App\Transformers;

use App\Entity\Post;
use League\Fractal\TransformerAbstract;

class PostsTransformer extends TransformerAbstract
{

  public function transform(Post $post)
  {
    $userInfo = $post->userInfo;
    $category = $post->category;
    return [
      'id'           => $post->id,
      'content'      => $post->content,
      'created_at'   => $post->created_at,
      'count_images' => $post->count_images,
      'lng'          => $post->lng,
      'lat'          => $post->lat,
      'images'       => $post->images,
      'user_info'    => [
        'user_id'  => $userInfo->user_id,
        'nickname' => $userInfo->nickname,
        'avatar'   => $userInfo->avatar,
        'gender'   => $userInfo->gender,
      ],
      'category'     => [
        'id'   => $category->id,
        'name' => $category->name,
      ],
    ];
  }
}