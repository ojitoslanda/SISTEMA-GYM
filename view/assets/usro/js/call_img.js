function readURL(input){
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function (e){
        $('#Image1')
        .attr('src', e.target.result)
        .width(200)
        .height(190);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
