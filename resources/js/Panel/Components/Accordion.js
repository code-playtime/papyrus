import { Collapse } from "bootstrap";

class Accordion {
    init() {
        this.processAccordions();
    }

    processAccordions() {
        const accordions = document.querySelectorAll(".accordion");
        const self = this;
        if(accordions.length > 0) {
            accordions.forEach(accordion => {
                self.initiateAccordion(accordion);
            })
        }
    }

    initiateAccordion(accordion) {
        const header = accordion.querySelector(".accordion-header");
        const body = accordion.querySelector(".accordion-body");
        const collapse = new Collapse(body, {
            toggle: false
        });

        header.addEventListener("click", () => {
            collapse.toggle();
        })
    }
}

export default Accordion;
