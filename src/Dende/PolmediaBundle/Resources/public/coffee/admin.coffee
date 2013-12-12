$ ->
  $("#videosAdminList").dataTable()
  $("#imagesAdminList").dataTable()
  $("a[rel^='prettyPhoto']").prettyPhoto
    social_tools: ''
    
  $("label[for='dende_polmediabundle_video_imageFile']").append("<img />");
    
  $("#dende_polmediabundle_video_imageFile").fileupload
#    method: 'POST'
#    multipart: false
#    formData:
#      _method: 'POST'
    limitMultiFileUploads: 1
    done: (e, data) ->
      response = data.response().result
      console.log response
      responseJSON = $.parseJSON(response)
      pathname = responseJSON.pathname
      filename = responseJSON.filename
      $("label[for='dende_polmediabundle_video_imageFile'] img").attr "src", pathname
      $("input#dende_polmediabundle_video_mainImage").val filename
    fail: (e, data) ->
      alert "Error with upload"