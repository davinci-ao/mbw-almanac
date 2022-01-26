window.addEventListener('load', (event) => {
    var element = document.getElementsByClassName('card-widget');
    element[0].style.height = element[1].clientHeight + 'px';
});

window.addEventListener('resize', function(event) {
    var element = document.getElementsByClassName('card-widget');
    element[0].style.height = element[1].clientHeight + 'px';
}, true);


function openImage(image, upvotes, comments){
    console.log(image);
    console.log(upvotes);
    console.log(comments);
    document.getElementsByClassName('image_opened')[0].style.display = 'block';
    image_opened_username.innerHTML = image.user_name;
    opened_image_image.src = "uploads/image/" + image.file_path;
}

function closeImage(){
    document.getElementsByClassName('image_opened')[0].style.display = 'none';
}
