package com.mock.bodyguards.entity;

import com.fasterxml.jackson.annotation.JsonIgnore;
import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Entity
@Setter
@Getter
@AllArgsConstructor
@NoArgsConstructor
public class Image extends AbstractBaseEntity{

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "url", nullable = false, length = 255)
    private String url;

    @ManyToOne
    @JoinColumn(name = "bodyguardTraining_id", nullable = false)
    @JsonIgnore
    private BodyguardTraining bodyguardTraining;
}
