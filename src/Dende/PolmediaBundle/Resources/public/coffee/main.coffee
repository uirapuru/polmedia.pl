$ ->
  $(window).on "resize", ->
    $("#addon").css "top", $(document).height() - 29 + "px"
    
  $(window).trigger "resize"
    
  $("a[rel^='prettyPhoto']").prettyPhoto
    social_tools: ''