class Primitives {
    init() {
        this.handleAlerts();
    }

    handleAlerts() {
        const alerts = document.querySelectorAll(".alert");
        if(alerts) {
            alerts.forEach((alert) => {
                alert.querySelector(".alert-dismissable").addEventListener("click", () => {
                    alert.remove();
                })
            })
        }
    }
}

export default Primitives;