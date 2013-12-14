$ ->
  $("#videosAdminList").dataTable()
  $("#imagesAdminList").dataTable()
  $("a[rel^='prettyPhoto']").prettyPhoto
    social_tools: ''
    
  mainImg = $("<img />").attr("src","/uploads/mainImage/"+$("input#dende_polmediabundle_video_mainImage").val());
  $("label[for='dende_polmediabundle_video_imageFile']").append(mainImg);
    
  $("#dende_polmediabundle_video_imageFile").fileupload
    limitMultiFileUploads: 1
    done: (e, data) ->
      response = data.response().result
      responseJSON = $.parseJSON(response)
      pathname = responseJSON.pathname
      filename = responseJSON.filename
      $("label[for='dende_polmediabundle_video_imageFile'] img").attr "src", pathname.replace "gallery","mainImage"
      $("input#dende_polmediabundle_video_mainImage").val filename
    fail: (e, data) ->
      alert "Error with upload"
      
  img = $("<img />").attr("src","/uploads/thumbnail/"+$("#dende_polmediabundle_image_thumbnail").val());
  $("label[for='dende_polmediabundle_image_image']").append(img);
  
  $("#dende_polmediabundle_image_image").fileupload
    limitMultiFileUploads: 1
    done: (e, data) ->
      response = data.response().result
      responseJSON = $.parseJSON(response)
      pathname = responseJSON.pathname
      filename = responseJSON.filename
      thumbnail = filename.replace "gallery","thumbnail"
      $("label[for='dende_polmediabundle_image_image'] img").attr "src", pathname.replace "gallery","thumbnail"
      $("input#dende_polmediabundle_image_url").val filename
      $("input#dende_polmediabundle_image_thumbnail").val thumbnail
    fail: (e, data) ->
      alert "Error with upload"