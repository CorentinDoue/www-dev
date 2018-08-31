import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import * as fromRoomForm from '../../reducers/room-form.reducer';
import { Store} from '@ngrx/store';
import {Room} from '../../../bookings/models/room.model';
import {UrlSafeStringService} from '../../../core/services/url-safe-string.service';



@Component({
  selector: 'brme-room-form',
  templateUrl: './room-form.component.html',
  styleUrls: ['./room-form.component.scss']
})
export class RoomFormComponent implements OnInit {
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
  @Input() verb: string;
  @Input() isNew = true;

  @Input()
  set room (room: Room | null) {
    if (room !== null) {
      this.form.patchValue(room);
    }
  }

  @Output() submitted = new EventEmitter<Room>();

  form: FormGroup = this.fb.group({
    id: [null],
    tag: [''],
    name: ['', Validators.required],
    description: [''],
    instructions: [''],
  });


  get name() { return this.form.get('name'); }
  get tag() { return this.form.get('tag'); }
  get description() { return this.form.get('description'); }
  get instructions() { return this.form.get('instructions'); }


  constructor(private fb: FormBuilder, private store: Store<fromRoomForm.State>, private urlSafeStringService: UrlSafeStringService) {}

  ngOnInit() {
  }

  submit() {
    if (this.form.valid) {
      if (this.isNew) {this.form.removeControl('id'); }
      this.tag.setValue(this.urlSafeStringService.generate(this.name.value));
      this.submitted.emit(this.form.value);
    }
  }

  getErrorMessage(formControl: FormControl) {
    return formControl.hasError('required') ? 'Ce champs ne doit pas être vide' : '';
  }
}
