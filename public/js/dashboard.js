document.addEventListener('DOMContentLoaded', function() {
    // Agency CRUD operations
    const addAgencyBtn = document.getElementById('addAgencyBtn');
    const editAgencyBtn = document.getElementById('editAgencyBtn');
    const deleteAgencyBtn = document.getElementById('deleteAgencyBtn');
  
    addAgencyBtn.addEventListener('click', function() {
      const form = document.getElementById('addAgencyForm');
      const formData = new FormData(form);
  
      fetch('/dashboard/add-agency', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          location.reload();
        }
      });
    });
  
    editAgencyBtn.addEventListener('click', function() {
      const form = document.getElementById('editAgencyForm');
      const formData = new FormData(form);
  
      fetch('/dashboard/edit-agency', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          location.reload();
        }
      });
    });
  
    deleteAgencyBtn.addEventListener('click', function() {
      const form = document.getElementById('deleteAgencyForm');
      const formData = new FormData(form);
  
      fetch('/dashboard/delete-agency', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          location.reload();
        }
      });
    });
  
    // Service CRUD operations
    const addServiceBtn = document.getElementById('addServiceBtn');
    const editServiceBtn = document.getElementById('editServiceBtn');
    const deleteServiceBtn = document.getElementById('deleteServiceBtn');
  
    addServiceBtn.addEventListener('click', function() {
      const form = document.getElementById('addServiceForm');
      const formData = new FormData(form);
  
      fetch('/dashboard/add-service', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const servicesModal = document.getElementById('servicesModal');
          const modal = bootstrap.Modal.getInstance(servicesModal);
          modal.hide();
          loadServices(formData.get('agency_id'));
        }
      });
    });
  
    editServiceBtn.addEventListener('click', function() {
      const form = document.getElementById('editServiceForm');
      const formData = new FormData(form);
  
      fetch('/dashboard/edit-service', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const servicesModal = document.getElementById('servicesModal');
          const modal = bootstrap.Modal.getInstance(servicesModal);
          modal.hide();
          loadServices(formData.get('agency_id'));
        }
      });
    });
  
    deleteServiceBtn.addEventListener('click', function() {
      const form = document.getElementById('deleteServiceForm');
      const formData = new FormData(form);
  
      fetch('/dashboard/delete-service', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const servicesModal = document.getElementById('servicesModal');
          const modal = bootstrap.Modal.getInstance(servicesModal);
          modal.hide();
          loadServices(formData.get('agency_id'));
        }
      });
    });
  
    // Load services for an agency
    function loadServices(agencyId) {
      fetch(`/dashboard/services/${agencyId}`)
        .then(response => response.json())
        .then(services => {
          const servicesList = document.getElementById('servicesList');
          servicesList.innerHTML = '';
          services.forEach(service => {
            const serviceElement = document.createElement('div');
            serviceElement.className = 'card mb-3';
            serviceElement.innerHTML = `
              <div class="card-body">
                <h5 class="card-title">${service.name}</h5>
                <p class="card-text">${service.description}</p>
                <p class="card-text">Type: ${service.type}</p>
                <p class="card-text">Prix: ${service.price} €</p>
                ${service.type === 'hotel' ? `<p class="card-text">Étoiles: ${service.stars}</p>` : ''}
                <button type="button" class="btn btn-sm btn-warning edit-service" data-service-id="${service.id}">Modifier</button>
                <button type="button" class="btn btn-sm btn-danger delete-service" data-service-id="${service.id}">Supprimer</button>
              </div>
            `;
            servicesList.appendChild(serviceElement);
          });
        });
    }
  
    // Event delegation for dynamically created buttons
    document.addEventListener('click', function(e) {
      if (e.target.classList.contains('edit-service')) {
        const serviceId = e.target.getAttribute('data-service-id');
        fetch(`/dashboard/service/${serviceId}`)
          .then(response => response.json())
          .then(service => {
            const modal = document.getElementById('editServiceModal');
            modal.querySelector('#editServiceId').value = service.id;
            modal.querySelector('#editServiceType').value = service.type;
            modal.querySelector('#editServiceName').value = service.name;
            modal.querySelector('#editServiceDescription').value = service.description;
            modal.querySelector('#editServicePrice').value = service.price;
            modal.querySelector('#editServiceStars').value = service.stars || '';
            new bootstrap.Modal(modal).show();
          });
      }
  
      if (e.target.classList.contains('delete-service')) {
        const serviceId = e.target.getAttribute('data-service-id');
        const modal = document.getElementById('deleteServiceModal');
        modal.querySelector('#deleteServiceId').value = serviceId;
        new bootstrap.Modal(modal).show();
      }
    });
  
    // Initialize modals
    const editAgencyModal = document.getElementById('editAgencyModal');
    editAgencyModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const agencyId = button.getAttribute('data-agency-id');
      const agencyName = button.getAttribute('data-agency-name');
      const agencyDescription = button.getAttribute('data-agency-description');
      
      const modal = this;
      modal.querySelector('#editAgencyId').value = agencyId;
      modal.querySelector('#editName').value = agencyName;
      modal.querySelector('#editDescription').value = agencyDescription;
    });
  
    const deleteAgencyModal = document.getElementById('deleteAgencyModal');
    deleteAgencyModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const agencyId = button.getAttribute('data-agency-id');
      
      const modal = this;
      modal.querySelector('#deleteAgencyId').value = agencyId;
    });
  
    const servicesModal = document.getElementById('servicesModal');
    servicesModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const agencyId = button.getAttribute('data-agency-id');
      const agencyName = button.getAttribute('data-agency-name');
      
      const modal = this;
      modal.querySelector('.modal-title').textContent = `Services de l'agence ${agencyName}`;
      modal.querySelector('#addServiceBtn').setAttribute('data-agency-id', agencyId);
      
      loadServices(agencyId);
    });
  });
  
  