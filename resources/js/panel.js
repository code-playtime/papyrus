// import { } from "module";
import { panel } from "./Panel/default.js"
import BlockEditor from "./Editor/BlockEditor";

// Initiate Panel
// Run after DOM Loaded
document.addEventListener("DOMContentLoaded", panel.init);

// Editor JS Setup
const editor = new BlockEditor("editor-container", {
    onChange: function(data) {
        let content = document.getElementById("editor-content");
        content.value = JSON.stringify(data);
    }
});
