var invoice = {

    invoice: {
        id: null,
        whatsapp_base_url: 'https://wa.me/?',
    },

    setInvoiceId: function(id) {
        this.invoice.id = id;
    },



    send: function() {

        var self = this;

        var data = {
            _token: self.invoice.token,
            invoice_id: self.invoice.id,
        };

        $.post(this.invoice.route, $.param(data), (res) => {
            var message = res.replaceAll("<br>", "\n");
            var data = {
                text: message
            };
            var link = this.invoice.whatsapp_base_url;
            console.log(link + $.param(data))
            window.open(link + $.param(data), "_blank");
            //window.location = link;
        });

    }

};
