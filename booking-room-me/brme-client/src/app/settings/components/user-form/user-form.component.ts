import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {User} from '../../models/user.model';
import * as fromUserForm from '../../reducers/user-form.reducer';
import {Observable} from 'rxjs';
import {select, Store} from '@ngrx/store';
import {CreateUser} from '../../actions/users.actions';
import {Credentials} from '../../../auth/models/auth.model';


@Component({
  selector: 'brme-user-form',
  templateUrl: './user-form.component.html',
  styleUrls: ['./user-form.component.scss']
})
export class UserFormComponent implements OnInit {
  ispending;

  @Input()
  set pending(isPending: boolean) {
    if (isPending) {
      this.form.disable();
      this.ispending = true;
    } else {
      this.form.enable();
      this.ispending = false;
    }
  }

  @Input() errorMessage: string | null;
  @Input() successMessage: string | null;

  @Output() submitted = new EventEmitter<User>();

  form: FormGroup = this.fb.group({
    email: ['', [ Validators.required, Validators.email ]],
    firstname: ['', Validators.required],
    lastname: ['', Validators.required],
    type: [''],
    bedroomnumber: [''],
    role: ['USER']
  });

  get email() { return this.form.get('email'); }
  get firstname() { return this.form.get('firstname'); }
  get lastname() { return this.form.get('lastname'); }
  get type() { return this.form.get('type'); }
  get bedroomnumber() { return this.form.get('bedroomnumber'); }
  get role() { return this.form.get('role'); }

  constructor(private fb: FormBuilder, private store: Store<fromUserForm.State>) {}

  ngOnInit() {}

  submit() {
    if (this.form.valid) {
      this.submitted.emit(this.form.value);
    }
  }

  getErrorMessage(formControl: FormControl) {
    return formControl.hasError('required') ? 'Ce champs ne doit pas être vide' :
      formControl.hasError('email') ? 'L\'email n\'est pas valide' : '';
  }

}
