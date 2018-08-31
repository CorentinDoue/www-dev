import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {FormControl, FormGroup, Validators} from '@angular/forms';
import {Credentials} from '../../models/auth.model';

@Component({
  selector: 'brme-reset-pwd-form',
  templateUrl: './reset-pwd-form.component.html',
  styleUrls: ['./reset-pwd-form.component.scss']
})
export class ResetPwdFormComponent implements OnInit {
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

  @Output() submitted = new EventEmitter<any>();

  form: FormGroup = new FormGroup({
    email: new FormControl('', [ Validators.required, Validators.email ])
  });

  get email() { return this.form.get('email'); }

  constructor() {}

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
