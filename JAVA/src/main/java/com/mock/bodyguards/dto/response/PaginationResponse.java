package com.mock.bodyguards.dto.response;

import io.swagger.v3.oas.annotations.media.Schema;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.Setter;

import java.util.List;

/**
 * Response for pagination
 *
 * @author Viet Doan
 * @version 1.0
 * @since 10.08.2024
 */
@Schema(name = "PaginationResponse", description = "Response for pagination")
@AllArgsConstructor
@Getter
@Setter
public class PaginationResponse<T> extends AbstractBaseResponse {
    @Schema(description = "Current page number")
    private int page;

    @Schema(description = "Number of items per page")
    private int limit;

    @Schema(description = "Total number of pages")
    private int totalPages;

    @Schema(description = "Total number of elements")
    private int totalElements;

    private List<T> content;

}
