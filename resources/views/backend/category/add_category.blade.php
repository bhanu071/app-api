<form action="{{route('store.category')}}" method="post" enctype="multipart/form-data">
@csrf

<label for="category_name">Category Name</label>
<input type="text" name="cateory_name"></br>
<label for="category_desc">Category Description</label> 
<input type="text" name="category_desc"></br>
<label for="category_img">Category Image</label> 
<input type="file" name="category_img"></br>
<input type="submit" value="Add Category">



</form>