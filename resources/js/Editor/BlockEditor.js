import EditorJS from "@editorjs/editorjs";
import Delimiter from "@editorjs/delimiter";
import Underline from "@editorjs/underline";
import CodeTool from "@editorjs/code";
import {
    header,
    paragraph,
    quote,
    list,
    image
} from "./Plugins/Config.js";

class BlockEditor {
    constructor(selector, {
        tools = {},
        data = {},
        onChange = () => {},
        onSave = () => {}
    } = {}) {
        this.selector = selector;
        this.tools = {
            header: header,
            paragraph: paragraph,
            quote: quote,
            delimiter: Delimiter,
            List: list,
            underline: Underline,
            code: CodeTool,
            image: image,
            ...tools
        }

        this.onChangeCallback = onChange;
        this.onSaveCallback = onSave;
        this.init(data);
    }

    init(initialData) {
        this.editor = new EditorJS({
            holder: this.selector,
            tools: this.tools,
            data: initialData,
            autofocus: true,
            placeholder: "Start writing your content here...",
            onChange: async () => {
                try {
                    const content = await this.editor.save();
                    this.onChangeCallback(content);
                } catch (err) {
                    console.error("Editor change capture failed :: ", err);
                }
            }
        });
    }

    attachContentHandler(element) {
        let editor = this.editor;
        editor.isReady
            .then(() => {
                if(element.value.trim()) {
                    return editor.render(JSON.parse(element.value));
                }
            })
            .catch((err) => {
                console.error("Error loading saved content: ", err);
            })
    }

    async saveContent(outputId) {
        try {
            const savedData = await this.editor.save();
            document.getElementById(outputId).textContent = JSON.stringify(savedData, null, 2);
        } catch (err) {
            console.error("Save failed :: ", err);
        }
    }
}

export default BlockEditor;
