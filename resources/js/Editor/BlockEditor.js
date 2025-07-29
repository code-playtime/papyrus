import EditorJS from "@editorjs/editorjs";
import Header from "@editorjs/header";
import Paragraph from "@editorjs/paragraph";
import Checklist from "@editorjs/checklist";

class BlockEditor {
    constructor(selector, {
        tools = {},
        data = {},
        onChange = () => {},
        onSave = () => {}
    } = {}) {
        this.selector = selector;
        this.tools = {
            header: Header,
            paragraph: Paragraph,
            checklist: Checklist,
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

    async saveContent(outputId) {
        try {
            const savedData = await this.editor.save();
            console.log(savedData);
            document.getElementById(outputId).textContent = JSON.stringify(savedData, null, 2);
        } catch (err) {
            console.error("Save failed :: ", err);
        }
    }
}

export default BlockEditor;
