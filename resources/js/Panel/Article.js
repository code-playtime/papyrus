import {
    makeSlug
} from "./utils.js";

class Article {
    init() {
        const form = document.getElementById("article-form");
        if(form) {
            this.processSlug();
            this.bannerPreview();
        }
    }

    processSlug() {
        const titleInput = document.getElementById("title");
        const slugInput = document.getElementById("slug");
        titleInput.addEventListener("change", function(e) {
            let slug = makeSlug(e.target.value);
            slugInput.value = slug;
        })
    }

    bannerPreview() {
        const bannerInput = document.getElementById("banner-image");
        const bannerPreview = document.getElementById("banner-preview");

        bannerInput.addEventListener("change", (e) => {
            const file = e.target.files[0];
            const preview = bannerPreview.querySelector("img");

            if(file && file.type.startsWith("image/")) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    preview.src = event.target.result;
                    bannerPreview.style.display = "block";
                }

                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                bannerPreview.style.display = "none";
            }
        })
    }
}

export default Article;
