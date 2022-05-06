$(document).ready(() => {
               $("#photo").change(function () {
                   const file = this.files[0];
                   if (file) {
                       let reader = new FileReader();
                       reader.onload = function (event) {
                           $("#preview_img")
                             .attr("src", event.target.result);
                       };
                       reader.readAsDataURL(file);
                   }
               });
           });
