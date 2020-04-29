export class User {
  constructor({ 
    id = null, // test id
    name = null, 
    role = null, 
    email = null, 
    phone_number = null,
    password = null,
    password_confirmation = null,
  } = {}) {
    this.id = id
    this.name = name 
    this.email = email 
    this.role = role 
    this.phone_number = phone_number
    this.password = password
    this.password_confirmation = password_confirmation
  }
}

export const createUser = (data) => {
  return Object.freeze(new User(data))
}