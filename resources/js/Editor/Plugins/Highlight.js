class HighlightBlock {
    static get toolbox() {
        return {
            title: "Highlight",
            icon: '<svg viewBox="0 0 20 20" width="20" height="20"><rect width="20" height="20" fill="#ffe066"/></svg>'
        }
    }

    constructor({ data }) {
        this.data = data;
        this.wrapper = undefined;
    }

    render() {
        this.wrapper = document.createElement("div");
        this.wrapper.contentEditable = true;
        this.wrapper.className = "highlight-block";
        this.wrapper.style.padding = "10px";
        this.wrapper.style.backgroundColor = "#fff3cd";
        this.wrapper.style.border = "1px dashed #ffe066";
        this.wrapper.textContent = this.data.text || "";
        return this.wrapper;
    }

    save(blockContent) {
        return {
            text: blockContent.innerText
        }
    }

    static get isReadOnlySupported() {
        return true;
    }
}

export default HighlightBlock;
