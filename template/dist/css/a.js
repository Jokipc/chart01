/*
  The solution below is a way to fix the percentages being off
  in iOs and Android devices and even browsers. It's also scalable
  because you can change the font-size of the stars and the width
  will adjust accordingly. This is the only way I found you could do
  unicode and CSS percentages for ratings.
*/

$(document).ready(function () {
  // Gets the span width of the filled-ratings span
  // this will be the same for each rating
  var star_rating_width = $(".fill-ratings span").width();
  // Sets the container of the ratings to span width
  // thus the percentages in mobile will never be wrong
  $(".star-ratings").width(star_rating_width);
});
