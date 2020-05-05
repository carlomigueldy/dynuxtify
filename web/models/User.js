import { mapUTCDate, dateFormat } from '../utils/Util'

export class User {
  constructor({ 
    name = null, 
    role = null, 
    email = null, 
    phone_number = null,
    password = null,
    password_confirmation = null,
  } = {}) {
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

export const mapUser = (obj) => ({
  id: obj.id,
  name: obj.name,
  email: obj.email,
  role: obj.role,
  authorized: obj.authorized,
  created_at: dateFormat(mapUTCDate(obj.created_at)),
})