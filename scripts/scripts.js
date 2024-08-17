
let contacts = JSON.parse(localStorage.getItem('contacts')) || [
  { name: 'João Silva', email: 'joao@email.com', phone: '(11) 98765-4321' },
  { name: 'Maria Santos', email: 'maria@email.com', phone: '(21) 98765-4321' },
  { name: 'Pedro Oliveira', email: 'pedro@email.com', phone: '(31) 98765-4321' },
  { name: 'Ana Rodrigues', email: 'ana@email.com', phone: '(41) 98765-4321' },
  { name: 'Carlos Ferreira', email: 'carlos@email.com', phone: '(51) 98765-4321' },
  { name: 'Mariana Costa', email: 'mariana@email.com', phone: '(61) 98765-4321' },
  { name: 'Lucas Almeida', email: 'lucas@email.com', phone: '(71) 98765-4321' },
  { name: 'Juliana Lima', email: 'juliana@email.com', phone: '(81) 98765-4321' },
  { name: 'Roberto Sousa', email: 'roberto@email.com', phone: '(91) 98765-4321' },
  { name: 'Fernanda Martins', email: 'fernanda@email.com', phone: '(12) 98765-4321' }
];

let currentUser = {
  name: 'Ana Souza',
  avatar: 'AS'
};

let currentSort = { field: 'name', order: 'asc' };
let currentFilter = '';
let currentPage = 1;
const contactsPerPage = 8;

function updateUserInfo() {
  document.getElementById('userName').textContent = currentUser.name;
  document.getElementById('userAvatar').textContent = currentUser.avatar;
}

function renderContacts() {
  const contactList = document.getElementById('contactList');
  contactList.innerHTML = '';

  const filteredContacts = contacts.filter(contact =>
    contact.name.toLowerCase().includes(currentFilter.toLowerCase()) ||
    contact.email.toLowerCase().includes(currentFilter.toLowerCase()) ||
    contact.phone.toLowerCase().includes(currentFilter.toLowerCase())
  );

  const sortedContacts = filteredContacts.sort((a, b) => {
    const aValue = a[currentSort.field].toLowerCase();
    const bValue = b[currentSort.field].toLowerCase();
    if (aValue < bValue) return currentSort.order === 'asc' ? -1 : 1;
    if (aValue > bValue) return currentSort.order === 'asc' ? 1 : -1;
    return 0;
  });

  const startIndex = (currentPage - 1) * contactsPerPage;
  const endIndex = startIndex + contactsPerPage;
  const paginatedContacts = sortedContacts.slice(startIndex, endIndex);

  paginatedContacts.forEach((contact, index) => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${contact.name}</td>
      <td>${contact.email}</td>
      <td>${contact.phone}</td>
      <td>
        <button class="action-btn" onclick="editContact(${startIndex + index})"><i class="bx bx-edit-alt"></i></button>
        <button class="action-btn" onclick="deleteContact(${startIndex + index})"><i class="bx bx-trash-alt"></i></button>
      </td>
    `;
    contactList.appendChild(tr);
  });

  updatePagination(sortedContacts.length);
}

function updatePagination(totalContacts) {
  const totalPages = Math.ceil(totalContacts / contactsPerPage);
  const pageInfo = document.getElementById('pageInfo');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');

  pageInfo.textContent = `Página ${currentPage} de ${totalPages}`;
  prevBtn.disabled = currentPage === 1;
  nextBtn.disabled = currentPage === totalPages;
}

function changePage(direction) {
  currentPage += direction;
  renderContacts();
}

function deleteContact(index) {
  if (confirm('Tem certeza que deseja excluir este contato?')) {
    contacts.splice(index, 1);
    localStorage.setItem('contacts', JSON.stringify(contacts));
    renderContacts();
  }
}

function openModal() {
  document.getElementById('addContactModal').style.display = 'block';
}

function closeModal() {
  document.getElementById('addContactModal').style.display = 'none';
}

function addNewContact(event) {
  event.preventDefault();
  const name = document.getElementById('newName').value;
  const email = document.getElementById('newEmail').value;
  const phone = document.getElementById('newPhone').value;

  if (name && email && phone) {
    contacts.push({ name, email, phone });
    localStorage.setItem('contacts', JSON.stringify(contacts));
    renderContacts();
    closeModal();
    event.target.reset();
  }
}

function editContact(index) {
  const contact = contacts[index];
  const name = prompt('Nome do contato:', contact.name);
  const email = prompt('Email do contato:', contact.email);
  const phone = prompt('Telefone do contato:', contact.phone);

  if (name && email && phone) {
    contacts[index] = { name, email, phone };
    localStorage.setItem('contacts', JSON.stringify(contacts));
    renderContacts();
  }
}

function logout() {
  if (confirm('Tem certeza que deseja terminar a sessão?')) {
    alert('Sessão terminada com sucesso!');
  }
}

function searchContacts() {
  currentFilter = document.getElementById('searchInput').value;
  currentPage = 1;
  renderContacts();
}

function toggleSort() {
  const fields = ['name', 'email', 'phone'];
  const currentIndex = fields.indexOf(currentSort.field);
  const nextField = fields[(currentIndex + 1) % fields.length];

  if (nextField === currentSort.field) {
    currentSort.order = currentSort.order === 'asc' ? 'desc' : 'asc';
  } else {
    currentSort = { field: nextField, order: 'asc' };
  }

  currentPage = 1;
  renderContacts();
}

function toggleFilter() {
  const filterOption = prompt('Filtrar por:\n1 - Nome\n2 - Email\n3 - Telefone');

  switch (filterOption) {
    case '1':
      currentFilter = prompt('Digite o nome para filtrar:') || '';
      break;
    case '2':
      currentFilter = prompt('Digite o email para filtrar:') || '';
      break;
    case '3':
      currentFilter = prompt('Digite o telefone para filtrar:') || '';
      break;
    default:
      currentFilter = '';
  }

  document.getElementById('searchInput').value = currentFilter;
  currentPage = 1;
  renderContacts();
}

// Fechar o modal se clicar fora dele
window.onclick = function (event) {
  if (event.target == document.getElementById('addContactModal')) {
    closeModal();
  }
}

updateUserInfo();
renderContacts();