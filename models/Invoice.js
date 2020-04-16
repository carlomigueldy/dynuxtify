import { dateFormat, mapUTCDate } from '../utils/Util.js'

export class Invoice {
  constructor({ 
    invoice_date = '', 
    due_date = '', 
    days_overdue = 0,
  } = {}) {
    this.invoice_date = dateFormat(invoice_date)
    this.due_date = dateFormat(due_date)
    this.days_overdue = days_overdue
  }
}

export const createInvoice = (data) => {
  return Object.freeze(new Invoice(data))
}

export const isOverDue = (date) => {
  const dueDate = mapUTCDate(date)
  const currentDate = mapUTCDate(new Date())

  return currentDate.getTime() > dueDate.getTime()
}