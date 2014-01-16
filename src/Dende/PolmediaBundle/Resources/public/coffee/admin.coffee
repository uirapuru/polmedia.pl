$ ->
  $("#videosAdminList").dataTable
    "aaSorting": [[ 5, "asc" ]],
      "aoColumns": [
        null,
        null,
        null,
        null,
        null
      ]
      
  $("#imagesAdminList").dataTable(

  )
  
  $(document).on "click", "span.saveOrder", (e) ->
    console.log "order changed"
    $input = $(this).siblings "input"
    value = parseInt $($input).val()
    url = $($input).attr("data-order-url").replace "orderNumber", value

    $.post url, (response) ->
      window.location.reload()
    
    e.preventDefault()
    
  $("a[rel*='prettyPhoto']").prettyPhoto
    social_tools: ''
    
  img = $("<img />").attr "src", $("input#dende_polmediabundle_video_mainImage").val()
  $("#dende_polmediabundle_video_imageFile").parents("div.controls").find("div.help-block").html img
    
  $("#dende_polmediabundle_video_imageFile").fileupload
    limitMultiFileUploads: 1
    done: (e, data) ->
      console.log "load"
      response = data.response().result
      responseJSON = $.parseJSON(response)
      pathname = responseJSON.mainImage
      filename = responseJSON.filename
      $("#dende_polmediabundle_video_imageFile").parents("div.controls").find("div.help-block img").attr "src", pathname
      $("input#dende_polmediabundle_video_mainImage").val filename
    fail: (e, data) ->
      alert "Error with upload"
      
  img = $("<img />").attr "src", $("#dende_polmediabundle_image_thumbnail").val()
  anchor = $("<a />").append(img).attr("href",$("#dende_polmediabundle_image_url").val()).attr("rel","prettyPhoto")
  $("#dende_polmediabundle_image_image").parents("div.controls").find("div.help-block").html anchor
  
  $("#dende_polmediabundle_image_image").fileupload
    limitMultiFileUploads: 1
    done: (e, data) ->
      response = data.response().result
      responseJSON = $.parseJSON(response)
      
      filename = responseJSON.filename
      pathname = responseJSON.pathname
      thumbnail = responseJSON.thumbnail
      
      $("input#dende_polmediabundle_image_url").val filename
      $("input#dende_polmediabundle_image_thumbnail").val filename
      
      parent = $("#dende_polmediabundle_image_image").parents("div.controls");
      parent.find("div.help-block a").attr "href", pathname
      parent.find("div.help-block img").attr "src", thumbnail
    fail: (e, data) ->
      alert "Error with upload"
      