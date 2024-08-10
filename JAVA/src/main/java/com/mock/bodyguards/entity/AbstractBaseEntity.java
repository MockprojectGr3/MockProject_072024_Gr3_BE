package com.mock.bodyguards.entity;

import jakarta.persistence.*;
import lombok.Getter;
import lombok.Setter;
import org.hibernate.annotations.CreationTimestamp;
import org.hibernate.annotations.UpdateTimestamp;
import org.springframework.data.annotation.CreatedDate;

import java.io.Serializable;
import java.time.LocalDateTime;

/**
 * This class serves as a superclass for all entities in the project.
 * It includes fields for the entity's ID and the timestamps of when it was created and last updated.
 *
 * @author Viet Doan
 * @version 1.0
 * @since 10.08.2024
 */
@MappedSuperclass
@Getter
@Setter
public class AbstractBaseEntity implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @CreationTimestamp
    @Column(updatable = false)
    private LocalDateTime createdAt;

    @UpdateTimestamp
    @Column(insertable = false)
    private LocalDateTime updatedAt;
}
