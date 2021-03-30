/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('follow-button', require('./components/FollowButton.vue').default);
Vue.component('following-follow-button', require('./components/FollowingFollowButton.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: '#app',
});

//Auto size textarea
autosize(document.querySelectorAll('textarea'));

//Image upload preview
const image = document.getElementById("image");
const previewContainer = document.getElementById("imagePreview");
const previewImage = document.getElementById("image-preview-image");
const customFileLabel = document.getElementById("custom-file-label");
const imageUploadError = document.getElementById("image-upload-error");

if (image != null) {
	image.addEventListener("change", function () {
		const file = this.files[0];
		const isImage = file && file['type'].split('/')[0] === "image";

		if (file && isImage) {
			const reader = new FileReader();

			previewContainer.style.display = "block";
			previewImage.style.display = "block";
			imageUploadError.innerHTML = "";

			reader.addEventListener("load", function () {
				previewImage.setAttribute("src", this.result);
			});

			reader.readAsDataURL(file);
		} else {
			if (!isImage) {
				imageUploadError.innerHTML = "The image must be an image.";
			}
			previewImage.style.display = null;
			previewContainer.style.display = null;
		}

		const fileName = image.value.split("\\").pop();
		customFileLabel.classList.add("selected");
		customFileLabel.innerHTML = fileName;
	});
}

//Dark Mode
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
	const ProfilePics = document.getElementsByClassName('profile-picture');

	Array.prototype.forEach.call(ProfilePics, function (element) {
		const elementFileName = element.src.split("/").pop();
		if (elementFileName == "no_image_available.svg") {
			element.style.filter = "invert(1)";
		}
	});
}
