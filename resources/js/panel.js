import { panel } from "./Panel/default.js"
import BlockEditor from "./Editor/BlockEditor";
import Article from "./Panel/Article.js";
import Accordion from "./Panel/Components/Accordion.js";

// Initiate Panel
// Run after DOM Loaded
document.addEventListener("DOMContentLoaded", panel.init);

const accordion = new Accordion();
accordion.init();

// Editor JS Setup
const editor = new BlockEditor("editor-container", {
    onChange: function(data) {
        let content = document.getElementById("editor-content");
        content.value = JSON.stringify(data);
    }
});

// Initiate operations in article module
const article = new Article();
article.init();
