$(document).ready(function() {
  // Get an array of all element heights
  var elementHeights = $('.travelcard-body').map(function() {
    return $(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  $('.travelcard-body').height(maxHeight);
});

//For Setting the Div element of the travelcard-body all to the same height of the tallest and most full div.
/*var maxheight = 0;

$('div .travelcard-body').each(function () {
    maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
});

$('div .travelcard-body').height(maxheight);*/